<?php
	session_start();
	class database
	{
		private $host =  "localhost";
		private $user = "root";
		private $pass = "";
		private $dbName = "schoolsystem";
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

		public function daySet($day)
		{
			$week = "";
			if ($day>=1 && $day<=7){ $week = 'First Week'; }
			else if ($day>=8 && $day<=15){ $week = 'Second Week'; }
			else if ($day>=16 && $day<=22){ $week = 'Third Week'; }
			else if ($day>=23 && $day<=31){ $week = 'Fourth Week'; }
			return $week;
		}

		public function monthSet($month)
		{
			$m = "";
			if ($month==1){ $m = 'Jan'; }
			else if ($month==2){ $m = 'Feb'; }
			else if ($month==3){ $m = 'Mar'; }
			else if ($month==4){ $m = 'Apr'; }
			else if ($month==5){ $m = 'May'; }
			else if ($month==6){ $m = 'Jun'; }
			else if ($month==7){ $m = 'Jul'; }
			else if ($month==8){ $m = 'Aug'; }
			else if ($month==9){ $m = 'Sept'; }
			else if ($month==10){ $m = 'Oct'; }
			else if ($month==11){ $m = 'Nov'; }
			else if ($month==12){ $m = 'Dec'; }		
			return $m;
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

		
		public function login($role , $email , $pass)
		{
			$q = "select * from ".$role." where email='$email' and pass='$pass'";
			if($this->num_rows($this->execute($q))>0)
			{
				$session;
				$url;
				$run = $this->execute($q);
				$data = $this->fetch_assoc($run);
				if ($role=='admin') { $session='admin'; $url='admin/index.php'; }
				if ($role=='teacher') { $session='teacher'; $url='reviews.php';}
				if ($role=='student') { $session='student'; $url='rating_comment.php'; }

				$_SESSION[$session] = $data['email'];
				$_SESSION['name'] = $data['name'];
				$_SESSION['id'] = $data['id'];
				echo $url;
			}
			else
			{
				echo "not";
			}

		}

		
		public function login_session($role)
		{
			if($role=='admin'){ $url = '../login.php'; } elseif ($role=='student' || $role=='teacher') { $url = 'login.php'; }
			if (!isset($_SESSION[$role]))
			{

				?> <script type="text/javascript"> window.location="<?= $url ?>"; </script> <?php
				return true;
			}
			
		}

		public function last_insert_id()
		{
			return mysqli_insert_id($this->con);
		}

		
		public function class_teacher_ids($column ,$column_data ,$desire_column)
		{
			$class_teacher_ids = "";
			$teacher_name_q = "select * from class_teacher where $column='$column_data'";
			$teacher_name_q_run = $this->execute($teacher_name_q);
			$name_cnt = $this->num_rows($teacher_name_q_run);
			$name_loop_cnt = 0;
			$teacher_id_cma = " , ";
			while ($teacher_name_data = $this->fetch_assoc($teacher_name_q_run))
			{
				$name_loop_cnt++;
				if ($name_loop_cnt==$name_cnt) { $teacher_id_cma =""; }

				if ($name_cnt>1)
					if ($desire_column=='class_name') { $class_teacher_ids.= "'".$teacher_name_data[$desire_column]."'".$teacher_id_cma; }
					else{ $class_teacher_ids.= $teacher_name_data[$desire_column].$teacher_id_cma; }
					
				else
					if ($desire_column=='class_name') { $class_teacher_ids.= "'".$teacher_name_data[$desire_column]."'"; }
					else{ $class_teacher_ids.= $teacher_name_data[$desire_column]; }
			}

			return $class_teacher_ids;


		} // class_teacher_ids

		
		public function class_teacher_names($column,$column_data,$table,$desire_column,$base_column)
		{
			$q = "select * from class_teacher join $table on class_teacher.$desire_column = $table.$base_column where class_teacher.$desire_column=$table.$base_column and $column='$column_data'";
			$cnt =$this->num_rows($this->execute($q));
			if ($cnt>0)
			{
				$loop_cnt = 0;
				$cma = " , ";
				$run1 = $this->execute($q);

				while ($teacher_class_data = $this->fetch_assoc($run1))
				{
					
					$loop_cnt++;
					if ($loop_cnt==$cnt) { $cma =""; }

					if ($cnt>1)
						echo ucfirst($teacher_class_data['name']).$cma;
					else
						echo ucfirst($teacher_class_data['name']);

				}
			}

		} // class_teacher_names

		
		public function class_teacher_name_filter($column, $column_data,$table)
		{
			if ($column_data=='') { $q =  "select * from $table"; } else { $q = "select * from $table where $column not in(".$column_data.")"; }
			return $this->execute($q);

		}// class_teacher_name_filter

		
		public function teacher_add_update($id,$name,$email,$pass,$subject,$action)
		{
			$q = "";
			if ($action=='update_teacher'){ $q = "update teacher set name='$name',email='$email',pass='$pass',subject='$subject' where id='$id'"; }
			else if ($action=='add_teacher')
			{ 
				if ($this->num_rows($this->execute("select * from teacher where email= '$email'"))>0)
				{
					echo "Teacher Already Exists";
					exit();
				}
				else
				{
					$q = "insert into teacher set name='$name',email='$email',pass='$pass',subject='$subject'";
				} 

			}
			if($this->execute($q)){ echo "teachers.php"; }

		}//teacher_add_update

		public function student_add_update($id,$name,$email,$pass,$class_id,$action)
		{
			$q = "";
			if ($action=='update_student'){ $q = "update student set name='$name',email='$email',pass='$pass',class_id='$class_id' where id='$id'"; }
			else if ($action=='add_student')
			{ 
				if ($this->num_rows($this->execute("select * from teacher where email= '$email'"))>0)
				{
					echo "Student Already Exists";
					exit();
				}
				else
				{
					$q = "insert into student set name='$name',email='$email',pass='$pass',class_id='$class_id'";
				} 

			}
			if($this->execute($q)){ echo "students.php"; }

		}//student_add_update

		public function rating_stars_view($rating)
		{
			if ($rating==1)
			{
				?><i class="fa fa-star"></i><?php
			}
			else if ($rating==2)
			{
				?>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				<?php
			}
			else if ($rating==3)
			{
				?>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				<?php
			}
			else if ($rating==4)
			{
				?>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				<?php
			}
			else if ($rating==5)
			{
				?>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				<?php
			}
		}

		public function reviews_filtering($class_name ,$teacher_id , $month ,$week , $action)
		{
			$q = "select * from reviews where teacher_id='$teacher_id' and class_name='$class_name' and month='$month' and week='$week'";
			$run = $this->execute($q);
			?>
				<table class="table" id="studentTable" style="margin-top: 25px;" >
				  
			<?php
			if ($action=="admin_filter")
			{
				// if()
				?>
					<thead> 
						<tr> 
							<th>#</th>
							<th>Teacher</th> 
							<th>Student</th>
							<th>Class</th> 
							<th>Comment</th>
							<th>Rating</th>
							<th>Action</th> 
							
						</tr> 
					</thead> 
				<?php
			}

			else if($action=="teacher_filter")
			{
				?>
					<thead> 
						<tr> 
							<th>#</th>
							<th>Class</th> 
							<th>Comment</th>
							<th>Rating</th>							
						</tr> 
					</thead> 
					<tbody>
						
					</tbody>
				<?php
			}
			$i = 1;
			while ($data = $this->fetch_assoc($run))
			{
				$teacher_data = $this->get_data_by_id('teacher', $data['teacher_id']);
				$student_data = $this->get_data_by_id('student',$data['student_id']);
				if ($action=="admin_filter")
				{
					?>
						<tr> 
							<td><?= $i ?></td> 

							<td><?= ucfirst($teacher_data['name']) ?></td> 
							<td><?= ucfirst($student_data['name']) ?></td>
							<td><?= $data['class_name'] ?></td>
							<td>
								<p><?= ucfirst($data['comment']) ?></p>
							</td>
							
							<td style="color: #FFFF33;">
								<?php $this->rating_stars_view($data['rating']); ?>
								
								
							</td>

							<td>
								<button type="button" onclick="review_delete(<?= $data['id'] ?>);" data-id="<?= $data['id'] ?>" class="btn btn-danger btn-circle btn-sm waves-effect waves-light review_delete"><i class="ico fa fa-trash"></i></button>
							</td> 
							
						</tr> 

					<?php
				}

				else if ($action=="teacher_filter")
				{

					?>
						<tr> 
							<td><?= $i ?></td> 
							<td><?= $data['class_name'] ?></td>
							<td><p><?= ucfirst($data['comment']) ?></p></td>
							<td style="color: #FFFF33;">
								<?php $this->rating_stars_view($data['rating']); ?>
							</td>
		
						</tr> 

					<?php
				}
				$i++;
				
			}
			?>		
					<?php
						if($this->num_rows($this->execute($q))==0 && $action=='admin_filter')
						{
							?>
								<tr class="text-center">
									<td colspan="7" >No Comment</td>
								</tr>
							<?php
						}
						else if($this->num_rows($this->execute($q))==0 && $action=='teacher_filter')
						{
							?>
								<tr class="text-center">
									<td colspan="4" >No Comment</td>
								</tr>
							<?php
						}
					?>
					</tbody>
				</table>
			<?php

		} // reviews_filtering

	}

	
	$con = new database();

?>