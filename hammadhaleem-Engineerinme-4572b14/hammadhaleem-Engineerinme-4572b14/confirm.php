<?php
  session_start();
  if(isset($_POST['confirm-sold']))
  {
      $bid=$_POST['bid'];
      header("location:./buybook.php?bid=$bid");
  }
  else
  $head_message="Make sure you really want to buy/get this book! ";
  $message="confirm";
	require('./includes/template.html.php');
?>