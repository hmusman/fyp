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

	if (isset($_REQUEST['book_review']))
	{
		$date = time();
		$book_id = $_REQUEST['book_id'];
		$book_review = $_REQUEST['book_review'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$q = "select * from book_review where ip_address='$ip' and book_id='$book_id'";
		if($con->num_rows($con->execute($q)) ==0)
		{
			$inser_q = "insert into book_review set ip_address='$ip' ,book_id='$book_id',book_review='$book_review',review_date='$date'";
			$con->execute($inser_q);
		}
		
		
	}

	if (isset($_REQUEST['hobby_id']))
	{
		// $array = $_REQUEST['hobby_id'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$hobby_id= $_REQUEST['hobby_id'];
		$q = "select * from user_hobby where ip_address='$ip'";
		if($con->num_rows($con->execute($q))>0)
		{
			$del_query = "delete from user_hobby where ip_address='$ip'";
			$con->execute($del_query);
		}
		
		// for ($i = 0; $i < count($array); $i++)
		// {
		// 	$hobby_id = $array[$i];
		// 	$inser_q = "insert into user_hobby set ip_address='$ip' , choose_hobby='$hobby_id'";
		// 	$con->execute($inser_q);
		// }
		$inser_q = "insert into user_hobby set ip_address='$ip' , choose_hobby='$hobby_id'";
		$con->execute($inser_q);
		
	}

	if (isset($_REQUEST['writer_id']))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$writer_id= $_REQUEST['writer_id'];
		$hobby_id= $_REQUEST['hobby_id'];
		$q = "select * from user_hobby_writer where ip_address='$ip'";
		if($con->num_rows($con->execute($q))>0)
		{
			$del_query = "delete from user_hobby_writer where ip_address='$ip'";
			$con->execute($del_query);
		}
		
		// for ($i = 0; $i < count($array); $i++)
		// {
		// 	$hobby_id = $array[$i];
		// 	$inser_q = "insert into user_hobby set ip_address='$ip' , choose_hobby='$hobby_id'";
		// 	$con->execute($inser_q);
		// }
		$inser_q = "insert into user_hobby_writer set ip_address='$ip' ,choose_category_hobby_id='$hobby_id' ,choose_category_hobby_writer_id='$writer_id'";
		$con->execute($inser_q);
		
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
		$con->login($_REQUEST['login'],$_REQUEST['email'],$pass);
	}

	if(isset($_REQUEST['category_action']))
	{
		$con->add_update_category($_REQUEST['id'],$_REQUEST['title'],$_REQUEST['description'],$_FILES['img'],$_REQUEST['category_action']);
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

	if(isset($_REQUEST['writer_action']))
	{
		$con->add_update_writer($_REQUEST['id'],$_REQUEST['name'],$_REQUEST['category'],$_REQUEST['writer_action']);
	}

	if (isset($_REQUEST['del_category_hobby_writer']))
	{
		$id = $_REQUEST['id'];
		$con->delete_record('category_hobby_writer',$id);
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
		$writer = $_REQUEST['writer'];	
		$description = $_REQUEST['description'];
		$img_name = $_FILES['img']['name'];
		$name = $_FILES['file']['name'];
		$img_path = '../uploads/books/'.$img_name;
		$path = '../files_folder/'.$name;
		$action = $_REQUEST['book_action'];
		$q = "";
		if ($action=='update_book')
		{
			if ($name=='') {  $name = $_REQUEST['old_file']; }
			if ($img_name=='') {  $img_name = $_REQUEST['old_img']; }
			$q = "update hobby_book set category_hobby_writer_id='$writer',category_hobby_id='$hobby',book_name='$name',book_img='$img_name',book_description='$description' where id='$id'"; 
		}
		else if ($action=='add_book')
		{ 
			if ($con->num_rows($con->execute("select * from hobby_book where category_hobby_id='$hobby' and category_hobby_writer_id='$writer' and book_name='$name'"))>0)
			{
				echo "Book Already Exists";
				exit();
			}
			else
			{
				$q = "insert into hobby_book set category_hobby_writer_id='$writer',category_hobby_id='$hobby',book_name='$name',book_img='$img_name',book_description='$description'";
			} 

		}
		if($con->execute($q))
		{ 
			if ($name!='') {move_uploaded_file($_FILES['file']['tmp_name'], $path);}
			if ($img_name!='') {move_uploaded_file($_FILES['img']['tmp_name'], $img_path);}
			echo "books.php";
		}
	}
	if (isset($_REQUEST['del_book']))
	{
		$id = $_REQUEST['id'];
		$con->delete_record('hobby_book',$id);
	}

	if(isset($_REQUEST['category_hobby_writer_filter']))
	{
		$con->category_hobby_writer_filter($_REQUEST['category']);
	}

	if (isset($_REQUEST['query']))
	{
		$con->search($_REQUEST['query']);
	}

?>
