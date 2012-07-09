<?php
  session_start();
  $username=$_POST['username'];
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $password=$_POST['password'];
  $re_password=$_POST['re_password'];
  $emailid=$_POST['emailid'];
  $phone=$_POST['phone'];
    $head_message="System says:";
    require('./includes/incl_user.php');
  $sql1="Select * from book_users where username='$username'";
                  $result=mysqli_query($con,$sql1);
                  $row=mysqli_fetch_array($result);
   if($username=='')
      $message="<center>Username cannot be empty<br />Click <a href=\"register.php\">Here</a> to coninue..</center>";
   else if($username==$row['username'])
      $message="<center>UserName Exits...Try Again...<br />Click <a href=\"register.php\">Here</a> to coninue..</center>";
   else if($firstname=='')
      $message="<center>First Name cannot be empty!<br />Click <a href=\"register.php\">Here</a> to coninue..</center>";
   else if($password=='')
      $message="<center>A valid Password must be chosen...<br />Click <a href=\"register.php\">Here</a> to coninue..</center>";
   else if($password!=$re_password)
      $message="<center>Passwords donot match<br />Click <a href=\"register.php\">Here</a> to coninue..</center>";
   else if($emailid=='')
      $message="<center>Please Submit a valid email-id..<br />Click <a href=\"register.php\">Here</a> to coninue..</center>";
   else
    {
      $sql2="Insert into book_users(username,firstname,lastname,pwd,email_id,phone) values('$username','$firstname','$lastname','$password','$emailid','$phone')";
      $result2=mysqli_query($con,$sql2);
        if(!$result2)
            $message="<center>Unable to add the Data...<br />Please <a href=\"contact-us.php\">let us know</a> about this Problem....</center>";
        else
            $message="<center> Your Account is Sucessfully Added...<br />Click <a href=\"index.php\">Here</a> to coninue..</center>";
    }
    require('./includes/template.html.php');
?>