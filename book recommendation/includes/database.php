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
	}

	
	$con = new database();

?>