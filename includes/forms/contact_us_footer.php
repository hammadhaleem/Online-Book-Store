<?php
    if(isset($_REQUEST['check']))
    {
      $headers=array();
      $admin_id="pankaj@engineerinme.com";
      $name=$_POST['name'];
      $email_id=$_POST['email_id'];
      $subject=$_POST['subject'];
      $message=$_POST['message'];
      if(($name=='')||($email_id=='')||($subject=='')||($message==''))
      {
          echo("It seems you have submitted some insuffiecient Data..Please try again..<br />");
          show_form();
      }
      else
      {
          require('./includes/functions/send_mail.php');
          $headers[] = 'From: '.$name.' <'.$email_id.'>';
          $final_headers = implode("\r\n",$headers);
          send_mail("Pankaj Sharma<".$admin_id.">","Message from Books.eim.com:".$subject,$message,$final_headers); //send_mail();
          echo("<center>Thanks for contacting Us. We will get back to you soon!</center>");
      }
    }
    else
    {
    	show_form_footer();
    }
?>
<?php
function show_form_footer()
{
?>
<form action="contact-us.php?check" method=POST>
<?php
  if(!$_SESSION['loggedIn'])
  {
?>
  <font color="white" >Your Name:&nbsp<input type="text" name="name" id="sender_name" size="20" /> <br />
  email-id:&nbsp<input type="email" name="email_id" id="sender_id" size="24" /> <br />
<?php
   }
   else
   {
        echo("<input type=\"hidden\" name=\"name\" value=\"".$_SESSION['user']."\" id=\"sender_name\" />\n");
        echo("<input type=\"hidden\" name=\"email_id\" value=\"".$_SESSION['email_id']."\" id=\"sender_name\" />\n");
   }
?>
   Subject:&nbsp&nbsp<input type="text" name="subject" id="mailing_subject" size="24" /><br />
   Your Message:<br />
   <textarea name="message" cols="30" rows="2">
   </textarea></font><br />
   &nbsp&nbsp&nbsp<input type="submit" value="Send!" />
   </form>
<?php
}
?>