<?php

 function display_books($book_ids)
      {
        if($book_ids!=NULL)
        {
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
       else
        echo("<center><b>No such Books Found..Probably No Books are submitted by User recently..</b></center>");
      }
      
    require('./functions/display_book.php');
    $sql1="select * from book_users where username='$username'";
    $sql2="select book_id from book_books where username='$username' order by sell_date desc limit 0,9";
    $result1=mysqli_query($con,$sql1);
    $result2=mysqli_query($con,$sql2);
    if(!$result1)
      echo("<center>Cannot Display this detail...<br />Please <a href=\"contact-us.php\">Contact Us </a> and let Us know about this!!</center>");
    else
      {
        $row1=mysqli_fetch_array($result1);
        echo("<center>");
        echo("<h3><font color=RED>User Name: </font>".$row1['username']."</h3>\n");
        echo("<h3><font color=RED>Full Name: </font>".$row1['firstname']." ".$row1['lastname']."</h3>\n");
        if($row1['college']!=NULL)
        echo("<h3><font color=RED>College/School Name: </font>".$row1['college']."</h3>\n");
        echo("<h3><font color=RED>Joining Details: </font>".$row1['joined_on']."</h3>\n");


        echo("<center><h3><U><font color=GREEN>Books Submitted by the User in Latest Past</font></U></h3></center>");
        if(!$result2)
          {}
        else
        {
              while($row2=mysqli_fetch_array($result2))
                $book_ids[]=$row2['book_id'];
            display_books($book_ids);
        }
      }
?>