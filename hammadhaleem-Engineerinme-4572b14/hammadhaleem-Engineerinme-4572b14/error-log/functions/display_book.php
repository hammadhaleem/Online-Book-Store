<?php

  function display_book($bid,$flag=1) //flag decide whether to show Delet button or Not
  {
    $sql="select * from book_books where book_id=$bid";
    $result1=mysqli_query($GLOBALS['con'],$sql);
    $row=mysqli_fetch_array($result1);
      echo("<center>".$row['bookname']);
      if($row['ind_pic']==NULL)
       echo("<br /><img src=\"../img/default-book.png\" /><br />");
      else
        echo("hii!");//TO be added soon
      echo("<font color=RED>Edition No.: </font>".$row['edition']."<br />");
      echo("<font color=GREEN>Author(s) Name: </font>".$row['authorsname']);
      echo("<p class=\"username\">Submitted by: <a href=\"?username=".$row['username']."\"><font color=BLUE>".$row['username']."</font></a></p></center>\n");
    if($flag):
?>
  <center>
  <form action=?delete method=POST >
      <input type="hidden" name="bid" value=<?php echo("\"".$bid."\""); ?> />
      <input type="submit" name="delete" value="Delete Book" />
   </form>
   <form action=?show-reviews method=POST >
      <input type="hidden" name="bid" value=<?php echo("\"".$bid."\""); ?> />
      <input type="submit" name="Show_Reviews" value="Show Reviews" />
   </form>
   </center>
<?php
  endif;
  }
?>