<?php
  session_start();
  require_once('../includes/incl_user.php');
  if(!$_SESSION['adminloggedIn'])
    header("location:../index.php");
  else
  {
    if(isset($_GET['search_books']))
    {
      $head_message="Result for Your Search Query";
      $message="search_books";
     	require('./template.html.php');
    }
    
    else if (isset($_GET['show-reviews']))
    {
      $bid=$_POST['bid'];
      $head_message="Reviews for selected Book";
      $message="show_reviews";
      require('./template.html.php');
     }
     
    else if(isset($_GET['delete']))
    {
    $bid=$_POST['bid'];
    $head_message="Do you realy want to Delete this BOOK?";
    $message="sure_to_delete";
    require('./template.html.php');
    }
    
    else if(isset($_GET['username']))
    {
    $username=$_GET['username'];
    $head_message="User deatails";
    $message="show_user_details";
    require('./template.html.php');
    }
    
    else if(isset($_POST['sure_to_delete_review']))
    {
    $review_id=$_POST['review_id'];
    $value=$_POST['sure_to_delete_review'];
    if($value=="YES")
    {
      $head_message="Deleting the selected Review";
      $sql="delete from book_reviews where review_id=$review_id";
      $result=mysqli_query($GLOBALS['con'],$sql);
        if(!$result)
          $message="<center>Unable to Delete :(</center>";
        else
          $message="<center>Deleted Successfully...<br />Click <a href=\"index.php\">Here</a> to continue...</center>";
      require('./template.html.php');
    }
    else
      header('location:index.php');
    }
     else if(isset($_GET['delete-review']))
      {
        $review_id=$_POST['review-id'];
        $head_message="Do you really want to delete this Review";
        $message="sure_delete_review";
        require('./template.html.php');
      }

    else if(isset($_GET['confirm']))
    {
      $value=$_POST['confirm_delete'];
      $bid=$_POST['bid'];
      if($value=='YES')
      {
      $sql0="select username from book_books where book_id=$bid";
      $result0=mysqli_query($con,$sql0);
      $row0=mysqli_fetch_array($result0);
      $user=$row0['username'];
      $sql="delete from book_books where book_id=$bid";
      $result=mysqli_query($con,$sql);
      if(!$result)
      {
         $head_message="Oops..";
         $message="<center>Canont Delete this Book..<br/>Click <a href=\"index.php\">here </a>to continue..</center>";
         require('./template.html.php');
      }
      
      else
      {
        $head_message="Deletion Successfull..";
         $message="<center>Successfully Deleted the Book..<br/>Click <a href=\"index.php\">here </a>to continue..</center>";
         $sql2="update book_users set nobs=nobs-1 where username='$user'";
         $result2=mysqli_query($con,$sql2);
         require('./template.html.php');
      }
     }
     else
        header('location:index.php');
     }
    else
    {
     $head_message="Welcome to Eim Book Store's Admin Panel!";
     $message="show_admin_panel";
     require('./template.html.php');
     }
   }

?>