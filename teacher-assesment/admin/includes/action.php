<?php
	require_once 'database.php';
	if (isset($_REQUEST['submit']))
	{
		$teacher_id = $_REQUEST['teacher_id'];
		$class_name = str_replace('_',' ',$_REQUEST['class_name']);
		$q = "insert into class_teacher set teacher_id='$teacher_id', class_name='$class_name'";
		$con->execute($q);
		if($_REQUEST['cat']=='class')
			echo("Class has been assigned");
		else
			echo "Teacher has been assigned";
	}

	if (isset($_POST['login']))
	{
		$con->login($_POST['role'],$_POST['email'], md5($_POST['pass']));
	}


?>