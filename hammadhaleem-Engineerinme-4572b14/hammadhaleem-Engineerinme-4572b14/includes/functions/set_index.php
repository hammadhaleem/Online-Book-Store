<?php
  require_once('./includes/incl_user.php');
  $count=0;
  $sql="select book_id from book_books";
  $result=mysqli_query($con,$sql);
  while(mysqli_fetch_array($result))
    $count++;
  $no_pages=ceil($count/12);
  if((!isset($_GET['id']))||($_GET['id']>$no_pages)||($_GET['id']==NULL)||($_GET['id']==1))
  {
  $id=1;
  $head_message="Latest Books submitted at EIM Book Store";
  $message="show_new_books";
  }
  else
  {
  $id=$_GET['id'];
  $head_message="Books submitted at EIM Book Store &bull; Page ".$id;
  $message="show_new_books";
  }
  $lim_max=$id*12;
  $lim_min=$lim_max-12;
?>