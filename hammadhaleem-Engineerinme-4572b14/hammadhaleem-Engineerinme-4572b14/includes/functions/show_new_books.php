<?php
  require('./includes/incl_user.php');
  require('./includes/functions/display_book.php');
  require_once('./includes/functions/display_page_nos.php');
  $sql="select book_id from book_books order by book_id desc limit $lim_min,$lim_max";
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
  show_page_nos($no_pages);
?>