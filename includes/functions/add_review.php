<?php
    //Function to display Add reiew Form//
?>

<?php
function add_review($bid)
{
echo("<center><font color=RED>Add a review</font></center>");
echo("<form action=\"book-review.php?check\" method=POST class=\"register\">");
if(!$_SESSION['loggedIn'])
  {
?>
  Your Name:<input type="text" name="name" id="sender_name" size="30" /> <br />
  email-id:<input type="email" name="email_id" id="sender_id" size="34" /> <br />
  <input type="hidden" value="0" name="flag" />
<?php
   }
   else
   {
        echo("<input type=\"hidden\" name=\"name\" value=\"".$_SESSION['user']."\" id=\"submitter_name\" />\n");
        echo("<input type=\"hidden\" name=\"email_id\" value=\"".$_SESSION['email_id']."\" id=\"email_id\" />\n");
        echo("<input type=\"hidden\" name=\"flag\" value=\"1\" id=\"flag_to_know_user_is_registers_or_anonymous\" />\n");
   }
?>
   Review:<br />
   <textarea name="message" cols="40" rows="2">
   </textarea>
    <input type="hidden" value=<?php echo("\"".$bid."\""); ?> name="bid" />
   <input type="submit" value="Submit!" />
</form>
<?php
 }
?>