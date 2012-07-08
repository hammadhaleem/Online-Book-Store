<?php
  session_start();
  $bid=$_GET['bid'];
  require_once('./includes/incl_user.php');
  $sql="select * from book_invoice where bookid=$bid";
  $result=mysqli_query($con,$sql);
  $count=0;
  if($result)
  {
    while(mysqli_fetch_array($result))
    $count++;
  if($count==0)
  {
  $head_message="YOUR BOOK IS REGISTERED!";
  $message="buy_book";
	require('./includes/template.html.php');
	}
	else
	{
	$head_message="BOOK Registered!";
	$message="<center><h3><font color=RED>This book is registered by some User<br />If you get this message after refreshing the Confirmation Page, it's on Your Name....<br />Otherwise if you need this book urgently please<br /><a href=\"contact-us.php\">Contact Us</a>.</font></h3></center>";
	require('./includes/template.html.php');
	}
	}
	else
	echo"HII";
?>