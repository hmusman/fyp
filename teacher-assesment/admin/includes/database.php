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

		public function class_teacher_names($column,$column_data,$table , $desire_column,$base_column)
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
		}
	}

	
	$con = new database();

?>