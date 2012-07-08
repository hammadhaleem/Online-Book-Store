<?php
  session_start();
  $search_id=$_REQUEST['search_type'];
  $key=$_REQUEST['keyword'];

    if((!isset($_GET['id']))||($_GET['id']==NULL)||($_GET['id']==1))
    {
    $id=1;
     $head_message="Results for Your Search";
      $message="search_books";
    }
    else
    {
    $id=$_GET['id'];
    $head_message="Results for Your Search &bull; Page ".$id;
    $message="search_books";
    }
	require('./includes/template.html.php');
?>