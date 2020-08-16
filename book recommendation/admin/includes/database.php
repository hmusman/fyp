<?php
	session_start();
	class database
	{
		private $host =  "localhost";
		private $user = "root";
		private $pass = "";
		private $dbName = "bookrecomendationdb";
		private $con;
		private $result;

		public function __construct()
		{
			$this->con = new mysqli($this->host,$this->user,$this->pass,$this->dbName);
			if($this->con->connect_error)
			{
				die("Connection Failed ". $this->con->connect_error);
			}
			else
			{
				return $this->con;
			}
		}

		public function execute($query)
		{
			return mysqli_query($this->con , $query);
		}

		public function fetch_assoc($result)
		{
			return mysqli_fetch_assoc($result);
		}

		public function num_rows($result)
		{
			return mysqli_num_rows($result);
		}

		public function get_data_by_id($table ,$id)
		{
			return $this->fetch_assoc($this->execute("select * from $table where id='$id'"));
		}

		public function delete_record($table ,$id)
		{
			$this->execute("delete from $table where id='$id'");
		}

		public function register($name,$email ,$pass)
		{
			$q = "insert into user set name='$name',email='$email',pass='$pass'";
			if($this->execute($q))
			{

				$_SESSION['user'] = $email;
				$_SESSION['name'] = $name;
				$_SESSION['id'] = $this->last_insert_id();
			}
		}

		public function login($role,$email,$pass)
		{
			$url ="";
			$q = "select * from $role where email='$email' and pass='$pass'";
			if($this->num_rows($this->execute($q))>0)
			{
				$run = $this->execute($q);
				$data = $this->fetch_assoc($run);
				$_SESSION[$role] = $data['email'];
				$_SESSION['name'] = $data['name'];
				$_SESSION['id'] = $data['id'];
				if ($role=='admin') { $url='admin/index.php'; } else if ($role=='user') { $url='index.php'; }
				echo $url;
			}
			else
			{
				echo "not";
			}
		}


		public function admin_login($email , $pass)
		{
			$q = "select * from admin where email='$email' and pass='$pass'";
			if($this->num_rows($this->execute($q))>0)
			{
				$run = $this->execute($q);
				$data = $this->fetch_assoc($run);
				$_SESSION['admin'] = $data['email'];
				$_SESSION['name'] = $data['name'];
				$_SESSION['id'] = $data['id'];
			}
			else
			{
				echo "not";
			}
		}

		public function admin_login_session()
		{
			if (!isset($_SESSION['admin']))
			{

				?> <script type="text/javascript"> window.location="../admin_login.php"; </script> <?php
				return true;
			}
		}

		public function login_session()
		{
			if (!isset($_SESSION['user']))
			{

				?> <script type="text/javascript"> window.location="login.php"; </script> <?php
				return true;
			}
		}

		public function last_insert_id()
		{
			return mysqli_insert_id($this->con);
		}


		public function add_update_category($id,$title,$description,$img,$action)
		{
			$img_name = $img['name'];
			$path = '../uploads/category/'.$img_name;
			$q = "";
			if ($action=='update_category'){ $q = "update category set title='$title',description='$description' ,img='$img_name' where id='$id'"; }
			else if ($action=='add_category')
			{ 
				if ($this->num_rows($this->execute("select * from category where title= '$title'"))>0)
				{
					echo "Category Already Exists";
					exit();
				}
				else
				{
					$q = "insert into category set title='$title',description='$description' ,img='$img_name'";
				} 

			}
			if($this->execute($q))
			{
				move_uploaded_file($img['tmp_name'], $path);
				echo "interest.php"; 
			}

		}//add_update_category

		public function add_update_hobby($id,$name,$category,$action)
		{
			$q = "";
			if ($action=='update_hobby'){ $q = "update category_hobby set category_id='$category',name='$name' where id='$id'"; }
			else if ($action=='add_hobby')
			{ 
				if ($this->num_rows($this->execute("select * from category_hobby where category_id='$category' and name='$name'"))>0)
				{
					echo "Hobby Already Exists";
					exit();
				}
				else
				{
					$q = "insert into category_hobby set category_id='$category',name='$name'";
				} 

			}
			if($this->execute($q)){ echo "hobbies.php"; }

		}//add_update_hobby

		public function add_update_writer($id,$name,$category,$action)
		{
			$q = "";
			if ($action=='update_writer'){ $q = "update category_hobby_writer set category_hobby_id='$category',name='$name' where id='$id'"; }
			else if ($action=='add_writer')
			{ 
				if ($this->num_rows($this->execute("select * from category_hobby_writer where category_hobby_id='$category' and name='$name'"))>0)
				{
					echo "Writer Already Exists";
					exit();
				}
				else
				{
					$q = "insert into category_hobby_writer set category_hobby_id='$category',name='$name'";
				} 

			}
			if($this->execute($q)){ echo "writers.php"; }

		}//add_update_writer


		public function category_hobby_filter($category_id)
		{
			?><option selected="" disabled="">Select Hobby</option><?php
		 
			$run = $this->execute("select * from category_hobby where category_id='$category_id'");
			while ($hobby_data = $this->fetch_assoc($run))
			{
				?><option value="<?= $hobby_data['id']?>"><?= ucfirst($hobby_data['name']) ?></option><?php
			}
		}

		public function category_hobby_writer_filter($category_hobby_id)
		{
			$run = $this->execute("select * from category_hobby_writer where category_hobby_id='$category_hobby_id'");
			?><option selected="" disabled="">Select Hobby Writer</option><?php
			while ($hobby_data = $this->fetch_assoc($run))
			{
				?><option value="<?= $hobby_data['id']?>"><?= ucfirst($hobby_data['name']) ?></option><?php
			}
		}

		public function search($query)
		{

			$q = "SELECT * from category_hobby_writer join hobby_book on category_hobby_writer.id = hobby_book.category_hobby_writer_id WHERE category_hobby_writer.name LIKE "."'".'%'.$query.'%'."'".' OR hobby_book.book_name LIKE '."'".'%'.$query.'%'."'";
			$run = $this->execute($q);
			$count = $this->num_rows($run);
			if($count>0)
			{
				while($data=$this->fetch_assoc($run) )
				{
					$book_id = $data['id'];
					$review_data_count = $this->num_rows($this->execute("select * from book_review where book_id='$book_id'"));
					$category_hobby_id = $data['category_hobby_id'];
					$category_q = "SELECT category.title,category_hobby.name FROM `category` join category_hobby on category.id = category_hobby.category_id WHERE category_hobby.id='$category_hobby_id'";
					$category_data = $this->fetch_assoc($this->execute($category_q));
					?>
						<div class="col-xl-4 col-lg-6 col-md-6">
							<div class="box_grid wow" style="visibility: visible;">
								<a href="view_book.php?book=<?= $data['book_name']?>"><img src="admin/uploads/books/<?= $data['book_img'] ?>" class="img-fluid" alt=""></a>
								<div class="wrapper">
									<small>Category</small>
									<h3><?php echo ucwords($category_data['title']); ?></h3>
									<small>Type</small>
									<h5 style="font-size: 15px;margin-left: 10px;"><?php echo ucwords($category_data['name']); ?></h5>
								</div>
								<ul>
									<li><a href="add_review.php?book=<?= $data['id']?>" style="width: 100% !important; margin-left:4%; ">Add Review</a></li>
									<li><a href="view_book.php?book=<?= $data['book_name']?>" style="width: 100% !important; margin-left:9%; ">View Book</a></li>
								</ul>
								<?php
									if($review_data_count>0)
									{
										?>
											<ul>
												<li style="width: 100%;"><a href="BookReview.php?book_id=<?= $data['id']?>" style="width: 100% !important; margin-left:30%; ">View Review</a></li>
											</ul>
										<?php
									}
								?>
							</div>
						</div>
					<?php
				}
			}
			else
			{
				?><div class="col-xl-4 col-lg-6 col-md-6"><div class="alert alert-warning">Sorry No Record Found!</div></div><?php
			}
			
		}

	}

	
	$con = new database();

?>