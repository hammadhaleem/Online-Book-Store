 
	<?php
	 session_start();
  
  require('./includes/incl_user.php');
  require('./includes/functions/display_book.php');
  $bd=$_REQUEST['bid'];
  if($bd="12")
  {
  echo"<center>";
  echo"<h1>Book you were looking has been already sold</h1>";
  echo"<h4><a href='index.php'>click here to continue</a></h4>";
  echo"</center>";
  }
  else{
  $sql="select book_id from book_books order by book_id desc limit 0,12";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
    $book_ids[]=$row['book_id'];
  echo("<table>");
  $count=1;
  foreach($book_ids as $book_id)
  {
    if($count%3==1)
      echo("<tr>");
    echo("<td>");
    display_book($book_id);
    echo("</td>");
    if($count%3==0)
      echo("</tr>");
    $count++;
    }
  echo("</table>");
  }
?>