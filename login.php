<?php
  session_start();
  require('./includes/incl_user.php');
  if($_SESSION[loggedIn])
    header('Location:index.php');
  if(isset($_GET['login']))
  {
   $head_message="Please Login:";
   $message="show_login_form";
   	require('./includes/template.html.php');
   	exit();
  }
  
    $username=$_POST['username'];
  	$password=$_POST['password'];
      $head_message="System says:";
      $message="not_logged_in";
    	$sql="SELECT * from book_users where username='$username'and pwd='$password';";
    	$result=mysqli_query($con,$sql);
	$count=0;
  while ($row = mysqli_fetch_array($result))
      $count++;
	if($count==1)
		{
      $sql_login="Update book_users set logged_in=logged_in+1 where username='$username'";
      $login=mysqli_query($con,$sql_login);
        if($login)
        {
          $message="<center>Successfully logged in..<br />Click <a href=\"index.php\">Here</a> to coninue..</center>";
          $sql_getdata="select * from book_users where username='$username'";
          $result_get=mysqli_query($con,$sql_getdata);
          $row_user=mysqli_fetch_array($result_get);
          /*Session Programming*/

          $_SESSION['loggedIn'] = TRUE;
          $_SESSION['user'] = $username;
          $_SESSION['email_id']=$row_user['email_id'];
          $_SESSION['password'] = $password;
          if(($row_user['user_type']==1)||($row_user['user_type']==2))
            $_SESSION['adminloggedIn']=TRUE;
        //  return TRUE;
  		}
  	}
	require('./includes/template.html.php');
?>