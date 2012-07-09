<?php
  session_start();
  $user=$_GET['user'];
  $head_message="Details of Selected User:";
  $message="show_user_details";
	require('./includes/template.html.php');
?>