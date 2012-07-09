<?php
    /*Checks and add Comments..Also ddisplay the selected comments using the function show_reviews with value of bid(book_id)*/
       function show_reviews($bid)
      {
        require_once('display_book.php');
        $sql="select * from book_reviews where book_id=$bid order by review_id desc";
        $result=mysqli_query($GLOBALS['con'],$sql);
        if(!$result)
        {
         echo("Unable to fetch Data :( ");
        }
        else
        {
           display_book($bid,0);
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
?>
                  <form action="?delete-review" method=POST>
                    <input type="hidden" name="review-id" value=<?php echo '"'.$row['review_id'].'"';?> />
                    <input type="submit" value="Delete" />
                  </form>
<?php
                  echo("</div>");
                  echo("</div>");
              }
        }
       }
?>