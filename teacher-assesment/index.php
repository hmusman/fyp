<?php
	session_start();
	if(isset($_SESSION['admin']))
	{
		?><script type="text/javascript">window.location="admin/index.php"; </script><?php
	}

	else if(isset($_SESSION['teacher']))
	{
		?><script type="text/javascript">window.location="reviews.php"; </script><?php
	}

	else if(isset($_SESSION['student']))
	{
		?><script type="text/javascript">window.location="rating_comment.php"; </script><?php
	}

	else
	{
		?><script type="text/javascript">window.location="login.php"; </script><?php
	}

?>