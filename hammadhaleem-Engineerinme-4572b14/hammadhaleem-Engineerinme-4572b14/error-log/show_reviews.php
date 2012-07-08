<?php
    /*Checks and add Comments..Also ddisplay the selected comments using the function show_reviews with value of bid(book_id)*/
       function show_reviews($bid)
      {
        $sql="select * from book_reviews where book_id=$bid order by review_id desc";
        $result=mysqli_query($GLOBALS['con'],$sql);
        if(!$result)
        {

        }
        else
        {
           $sql1="select bookname from book_books where book_id=$bid";  //To select Book Name
           $result1=mysqli_query($GLOBALS['con'],$sql1);
           if(!$result1)
           echo("<h3><font color=RED>Argument you sumbitted is wrong..Unable to select Book..</font></h3>");
           else
            {
              $row1=mysqli_fetch_array($result1);
              echo("<h3><font color=RED>Book Name: <a href=\"enlarge.php?bid=".$bid."\">".$row1['bookname']."</a></font></h3>");
               while($row=mysqli_fetch_array($result))
               {
                  echo("<div class=\"review\">");
                  echo("<div class=\"review_user\">");
                //  echo("<img src=\"./img/user.png\" />");
                  echo("<span>");
                 if($row['flag']==0)
                  echo($row['username']);
                 else
                  echo("<a href=\"profile.php?user=".$row['username']."\">".$row['username']."</a>");
                  echo("</span>");
                  echo("</div>");
                  echo("<div class=\"review_post\">");
                  echo("<p>".$row['review']."</p>");
                  echo("</div>");
                  echo("</div>");
              }
            echo("<center><h3><font color=RED>Add a Review for This Book..<br /> You can help others by Submitting One...</font></h3></center>");
          add_review($bid); //Show form to add a Review

            }
        }
       }

    if(isset($_GET['check']))
    {
      $name=$_POST['name'];
      $email_id=$_POST['email_id'];
      $review=$_POST['message'];
      $flag=$_POST['flag'];
      $bid=$_POST['bid'];
      if(($name=='')||($email_id=='')||($review==''))
      {
          echo("It seems you have submitted some insuffiecient Data..Please try again..<br />");
          add_review($bid);
      }

      else if((strlen($review))<10)
      {
          echo("Don't you feel it's too short to be a Review..Please try again..<br />");
          add_review($bid);
      }
      else
      {
         $sql1="insert into book_reviews(book_id, username, email_id, review, flag) values($bid,'$name','$email_id','$review',$flag)";
         $result1=mysqli_query($con,$sql1);
         if(!$result1)
         echo("Unable to add Your Review");
         else
          echo("<center><font color=RED>Successfully Added your review</font></center>");
          show_reviews($bid);
      }
    }

    else
    {
      $bid=$_GET['bid'];
      show_reviews($bid);
    }
?>