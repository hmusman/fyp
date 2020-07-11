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

		public function login($email , $pass)
		{
			$q = "select * from user where email='$email' and pass='$pass'";
			if($this->num_rows($this->execute($q))>0)
			{
				$run = $this->execute($q);
				$data = $this->fetch_assoc($run);
				$_SESSION['user'] = $data['email'];
				$_SESSION['name'] = $data['name'];
				$_SESSION['id'] = $data['id'];
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


		public function add_update_category($id,$title,$description,$action)
		{
			$q = "";
			if ($action=='update_category'){ $q = "update category set title='$title',description='$description' where id='$id'"; }
			else if ($action=='add_category')
			{ 
				if ($this->num_rows($this->execute("select * from category where title= '$title'"))>0)
				{
					echo "Category Already Exists";
					exit();
				}
				else
				{
					$q = "insert into category set title='$title',description='$description'";
				} 

			}
			if($this->execute($q)){ echo "institutes.php"; }

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


		function category_hobby_filter($category_id)
		{
			?><option selected="" disabled="">Select Hobby</option><?php
		 
			$run = $this->execute("select * from category_hobby where category_id='$category_id'");
			while ($hobby_data = $this->fetch_assoc($run))
			{
				?><option value="<?= $hobby_data['id']?>"><?= ucfirst($hobby_data['name']) ?></option><?php
			}
		}

	}

	
	$con = new database();

?>