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

	if (isset($_REQUEST['add_class']))
	{
		$name = $_REQUEST['name'];
		if ($con->num_rows($con->execute("select * from classes where name='$name'"))>0)
		{
		 	echo "Class Already Exists";
		} 
		else
		{
			$con->execute("insert into classes set name='$name'");
			echo "classes.php";
		}
	}

	if (isset($_REQUEST['update_class']))
	{
		$name = $_REQUEST['name'];
		$id = $_REQUEST['id'];
		$con->execute("update classes set name='$name' where id='$id'");
		echo "classes.php";
	}

	if (isset($_REQUEST['del_class']))
	{
		$id = $_REQUEST['id'];
		$con->delete_record('classes',$id);
	}

	if(isset($_REQUEST['teacher_action']))
	{
		echo $con->teacher_add_update($_REQUEST['id'],$_REQUEST['name'],$_REQUEST['email'],md5($_REQUEST['pass']),$_REQUEST['subject'],$_REQUEST['teacher_action']);
	}

	if (isset($_REQUEST['del_teacher']))
	{
		$id = $_REQUEST['id'];
		$con->delete_record('teacher',$id);
	}


	if (isset($_REQUEST['student_review']))
	{
		$week = "";
		$m = "";
		$time = time();
		$year = date('Y',$time);
		$month = date('m',$time);
		$day = date('d',$time);
		if ($day>=1 && $day<=7){ $week = 'First Week'; }
		else if ($day>=8 && $day<=15){ $week = 'Second Week'; }
		else if ($day>=16 && $day<=22){ $week = 'Third Week'; }
		else if ($day>=23 && $day<=31){ $week = 'Fourth Week'; }
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
		$class_name = $_REQUEST['class_name'];
		$teacher_id = $_REQUEST['teacher_id'];
		$student_id = $_REQUEST['student_id'];
		$comment = $_REQUEST['comment'];
		$rating = $_REQUEST['rating'];
		$q = "";
		if ($con->num_rows($con->execute("select * from reviews where comment='$comment' and rating='$rating'"))>0)
		{
			echo "You Have Already Left Comment";
		}
		else
		{
			if($con->execute("insert into reviews set teacher_id='$teacher_id',student_id='$student_id',class_name='$class_name',comment='$comment',year='$year',month='$m',week='$week',rating='$rating'")){ echo "Your Comment Has Been Recieved"; }
		}
	} // student_review


	if (isset($_REQUEST['class_teacher']))
	{
		$class_name = str_replace('_',' ',$_REQUEST['class_name']);
		$q = "SELECT teacher.id , teacher.name FROM class_teacher join teacher on class_teacher.teacher_id = teacher.id where class_teacher.class_name='$class_name'";
		$run = $con->execute($q);
		?><option selected="" disabled="">Select Teachers</option><?php
		while($data = $con->fetch_assoc($run))
		{
			?>
				<option value="<?= $data['id'] ?>"><?= ucfirst($data['name']) ?></option>
			<?php
		}

	}
?>