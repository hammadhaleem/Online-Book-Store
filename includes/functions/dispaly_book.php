<?php
    require_once('./includes/incl_user.php');

  function display_book($bid)
  {
    require('./includes/incl_user.php');
    $sql123 = "SELECT * FROM `book_invoice` WHERE `bookid`=$bid";
   $result1234=mysqli_query($con,$sql123);
    $sql="select * from book_books where book_id=$bid";
    $result1=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result1);
      echo("<center><a href=\"books/enlarge.php\">".$row['bookname']);
      if($row['ind_pic']==NULL)
       echo("<br /><img src=\"./img/default-book.png\" /><br />");
      else
        echo("hii!");//TO be added soon
      echo("</a>");
      echo("<font color=RED>Edition No.: </font>".$row['edition']+1."<br/>");
      echo("<font color=GREEN>Author(s) Name: </font>".$row['authorsname']);
      if($result==NULL)
{
 echo("<font color=GREEN>book availiblity: </font> available</center>");
 }
 else
  {
echo("<font color=GREEN>book availiblity: </font>sold</center>");
  }
  }
?>