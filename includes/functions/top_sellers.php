<?php
  require_once('./includes/incl_user.php');
  $sql="select username from book_users order by nobs desc";
  $result=mysqli_query($con,$sql);
  if(!$result)
    echo("Unable to Display");
  else
  {
    echo("<ul class=\"top\">");
    for($i=0;$i<5;$i++)
    {
      $row=mysqli_fetch_array($result);
      echo("<li><a href=\"profile.php?user=".$row['username']."\"><font color=GREEN>".$row['username']."</font></a></li>");
    }
    echo("</ul>");
  }
?>