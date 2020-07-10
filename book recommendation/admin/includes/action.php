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
			$con->execute($del_query);
		}
		
		$inser_q = "insert into user_category set ip_address='$ip' , choose_category='$category_id'";
		$con->execute($inser_q);
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

	if (isset($_REQUEST['register']))
	{
		$pass= md5($_REQUEST['pass']);
		$con->register($_REQUEST['name'],$_REQUEST['email'],$pass);
	}

	if (isset($_REQUEST['admin_login']))
	{
		$pass= md5($_REQUEST['pass']);
		$con->admin_login($_REQUEST['email'],$pass);
	}

	if (isset($_REQUEST['login']))
	{
		$pass= md5($_REQUEST['pass']);
		$con->login($_REQUEST['email'],$pass);
	}

	if(isset($_REQUEST['category_action']))
	{
		$con->add_update_category($_REQUEST['id'],$_REQUEST['title'],$_REQUEST['description'],$_REQUEST['category_action']);
	}

	if (isset($_REQUEST['del_category']))
	{
		$id = $_REQUEST['id'];
		$con->delete_record('category',$id);
	}


	if(isset($_REQUEST['hobby_action']))
	{
		$con->add_update_hobby($_REQUEST['id'],$_REQUEST['name'],$_REQUEST['category'],$_REQUEST['hobby_action']);
	}

	if (isset($_REQUEST['del_hobby']))
	{
		$id = $_REQUEST['id'];
		$con->delete_record('category_hobby',$id);
	}

	if (isset($_REQUEST['book_action']))
	{
		$id = $_REQUEST['id'];
		$hobby = $_REQUEST['hobby'];
		$name = $_FILES['file']['name'];
		$path = '../files_folder/'.$name;
		$action = $_REQUEST['book_action'];
		$q = "";
		if ($action=='update_book')
		{
			if ($name=='') {  $name = $_REQUEST['old_name']; }
			$q = "update hobby_book set category_hobby_id='$hobby',book_name='$name' where id='$id'"; 
		}
		else if ($action=='add_book')
		{ 
			if ($con->num_rows($con->execute("select * from hobby_book where category_hobby_id='$hobby' and book_name='$name'"))>0)
			{
				echo "Book Already Exists";
				exit();
			}
			else
			{
				$q = "insert into hobby_book set category_hobby_id='$hobby',book_name='$name'";
			} 

		}
		
		if($con->execute($q))
		{ 
			if ($name!='') {move_uploaded_file($_FILES['file']['tmp_name'], $path);}
			
			echo "books.php";
		}
	}
	if (isset($_REQUEST['del_book']))
	{
		$id = $_REQUEST['id'];
		$con->delete_record('hobby_book',$id);
	}

	if(isset($_REQUEST['category_hobby_filter']))
	{
		$con->category_hobby_filter($_REQUEST['category']);
	}

?>
