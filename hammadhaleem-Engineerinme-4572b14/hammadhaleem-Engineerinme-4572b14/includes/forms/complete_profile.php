<?php
  require_once('./includes/incl_user.php');
  $flag=1;
  $user=$_SESSION['user'];
  $sql="select * from book_users where username='$user'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($result);
  if(isset($_GET['checkandsave']))
  {
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $password=$_POST['password'];
    $re_password=$_POST['re_password'];
    $email_id=$_POST['email_id'];
    $phone=$_POST['phone'];
    $college=$_POST['college'];
    $line1=$_POST['adr_line1'];
    $line2=$_POST['adr_line2'];
    $city=$_POST['adr_city'];
    $state=$_POST['adr_state'];
    $country=$_POST['adr_coun'];
    if($firstname=='')
      echo("<p class=\"error_message\">First Name must be given</p>");
    else if(($password!=$_SESSION['password'])&&($password!=$re_password))
      echo("<center>Passwords do not match!<br /></center>");
    else
      {
        $sql1="update book_users set firstname='$firstname',lastname='$lastname',pwd='$password',email_id='$email_id',phone='$phone',college='$college',phone='$phone',adr_line1='$line1',adr_line2='$line2',adr_city='$city',adr_state='$state',adr_coun='$country' where username='$user'";
        $result1=mysqli_query($con,$sql1);
        if(!$result1)
          echo("<center>Something went wrong...Please <a href=\"contact-us.php\">Contact Us</a> about this.</center>");
        else
        {
          echo("<center>All right!!!<br />");
          echo("Your changes are saved...<br />Please continue..<br />");
          echo("Click <a href=\"index.php\">Here</a> to return to Home.</center>");
          $flag=0;
        }
      }
  }

if($flag)
  {
  echo("<form action=\"?checkandsave\" method=POST class=\"register\" >");
  echo("First Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"firstname\" value=\"".$row['firstname']."\" size=\"25\" /><br />");
  echo("Last Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"lastname\" value=\"".$row['lastname']."\" size=\"25\" /><br />");
  echo("Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"password\" name=\"password\" value=\"".$row['pwd']."\" size=\"25\" /><br />");
  echo("Repeat Password:<input type=\"text\" name=\"re_password\" value=\"\" size=\"25\" /><br />");
  echo("Email-id:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"email\" name=\"email_id\" value=\"".$row['email_id']."\" size=\"25\" /><br />");
  echo("Phone No. :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"phone\" value=\"".$row['phone']."\" size=\"25\" /><br />");
  echo("College:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"college\" value=\"".$row['college']."\" size=\"25\" /><br />");
  echo("Address: Line1:&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"adr_line1\" value=\"".$row['adr_line1']."\" size=\"20\" /><br />");
  echo("Line 2:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"adr_line2\" value=\"".$row['adr_line2']."\" size=\"25\" /><br />");
  echo("City:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"adr_city\" value=\"".$row['adr_city']."\" size=\"25\" /><br />");
  echo("State:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type=\"text\" name=\"adr_state\" value=\"".$row['adr_state']."\" size=\"25\" /><br />");
  echo("Country:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"text\" name=\"adr_coun\" value=\"India\" size=\"25\" /><br />");
  echo("&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=\"submit\" value=\"Save\" /><input type=\"reset\" value=\"Reset\">");
  echo("</form>");
  }
?>