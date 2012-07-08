<?php
  if($meta=="enlargebook")
  {
    require_once('./includes/incl_user.php');
    $sql0="select * from book_books where book_id=$bid";
    $result=mysqli_query($con,$sql0);
    if(!$result)
       $title="EngineerInMe Book Store";
     else
     {
      $row0=mysqli_fetch_array($result);
      $title=$row0['bookname']." by ".$row0['authorsname'];
     }
  }
  else
    $title="EngineerInMe Book Store";
?>