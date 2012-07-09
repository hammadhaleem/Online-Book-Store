<?php
  require_once('./includes/incl_user.php');
  require_once('./includes/functions/add_review.php');
  $bid=$_REQUEST['bid'];
  $sql="select * from book_books where book_id=$bid";
  $result=mysqli_query($con,$sql);
  if(!$result)
    echo("Cannot show the required details!");
  else
    {
     $row=mysqli_fetch_array($result);
     echo("<center>");
     echo("<h4><font color=RED>Please note that After clicking your \"Confirm\", this book will be registered on Your Name!</font></h4>\n");
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
     echo('<form action="" method=POST>');
     echo('<input type="checkbox" name="confirm-sold" vlaue="confirm" />');
     echo('I confirm that I need this book/want to purchse this Book');
     echo('<input type="hidden" name="bid" value="'.$bid.'" />');
     echo('<input type="image" src="./img/button_confirm.png" value="submit" />');
     echo("</center>");
     
     }
?>