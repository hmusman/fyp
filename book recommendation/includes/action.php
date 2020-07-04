<?php
	require_once('database.php');
	if (isset($_REQUEST['category_id']))
	{
		$category_id = $_REQUEST['category_id'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$q = "select * from user_category where ip_address='$ip'";
		if($con->num_rows($con->execute($q))>0)
		{
			$del_query = "delete from user_category where ip_address='$ip'";
			if ($con->execute($del_query))
			{
				$inser_q = "insert into user_category set ip_address='$ip' , choose_category='$category_id'";
				$con->execute($inser_q);
			}
		}
		else
		{
			$inser_q = "insert into user_category set ip_address='$ip' , choose_category='$category_id'";
			$con->execute($inser_q);
		}
	}

	if (isset($_REQUEST['hobby_id']))
	{
		$array = $_REQUEST['hobby_id'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$q = "select * from user_hobby where ip_address='$ip'";
		if($con->num_rows($con->execute($q))>0)
		{
			$del_query = "delete from user_hobby where ip_address='$ip'";
			$con->execute($del_query);
		}
		
		for ($i = 0; $i < count($array); $i++)
		{
			$hobby_id = $array[$i];
			$inser_q = "insert into user_hobby set ip_address='$ip' , choose_hobby='$hobby_id'";
			$con->execute($inser_q);
		}
		
	}
?>