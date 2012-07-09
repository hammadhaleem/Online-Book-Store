<?php
  require_once('./includes/incl_user.php');
  require_once('./includes/functions/add_review.php');
  $sql="select * from book_books where book_id=$bid";
  $result=mysqli_query($con,$sql);
  if(!$result)
    echo("Cannot show the required details!");
  else
    {
     $row=mysqli_fetch_array($result);
      if($row)
      {
     echo("<center>");
     echo("<h2><font color=RED>Book Name: </font>".$row['bookname']."</h2>\n");
     if($row['ind_pic']==NULL)
      echo("<img src=\"./img/default-book-big.png\" alt=\"".$row['bookname']."\" />");
      else
      {  //To be added soon
      }
     echo("<h3><font color=RED>Author(s) Name: </font>".$row['authorsname']."</h3>\n");
     echo("<h3><font color=RED>Edition Number: </font><font color=GREEN>".$row['edition']."</font></h3>\n");
     echo("<h3><font color=RED>Category: </font>");
     $tid=$row['type_id'];
     $sql2="select book_type from book_types where type_id=$tid";
     $result2=mysqli_query($con,$sql2);
     if(!result2)
      echo("Unknown</h2>\n");
    else
      {
        $row2=mysqli_fetch_array($result2);
         echo($row2['book_type']."</h2>\n");
      }
     echo("<h3><font color=RED>Related to: </font><font color=GREEN>".$row['subject']."</font></h3>\n");
     echo("<h3><font color=RED>Recommended for/ as: </font>".$row['rec_year']."</h3>\n");
     echo("<h3><font color=RED>Condition of Book: </font><font color=GREEN>".$row['cond']."</font></h3>\n");
     echo("<h3><font color=RED>Expected Price: </font><font color=GREEN>");
     if(!$row['price'])
     echo("Free Of Cost</font></h3>\n");
     else
     echo("INR. ".$row['price']." /- </font></h3>\n");
     echo("<h3><font color=RED>Submitted by: </font><a href=\"profile.php?user=".$row['username']."\"><font color=BLUE>".$row['username']."</font></a></h3>\n");
    if($_SESSION['loggedIn'])
       {  //checking sold or not sold book
          $sql123 = "SELECT `sold` FROM `book_invoice` WHERE `bookid`=$bid;";
          $result1234=mysqli_query($con,$sql123);
          $row1=mysqli_fetch_array($result1234);
             if($row1['sold']!=sold)
             {
                   echo "<a href=\"confirm.php?bid=".$bid."\"><img src=\"./img/get-it-now.png\" /></a><br />";
             }
             else
            {
                  echo("<h2><font color=GREEN>Book availiblity: </font><font color=red>Sold </font></center><h2>");
            } 
  	}
  	else
  		echo "<a href=\"login.php?login\"><img src=\"./img/get-it-now.png\" /></a><br />";
     echo("</center>");
     add_review($bid);
     echo'<center>';
     echo("<a href=\"book-review.php?bid=".$bid."\"><img src=\"./img/view-review.png\" /></a><br />");
     echo'</center>';
     }
     else
     echo('<center><font color="RED">This Book is Not Present.<br />Either you have supplied a wrong Argument. or It has been removed.<br />Please Click <a href="index.php">Here</a> to continue.</font></center>');
}
?>