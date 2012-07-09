 <?php
   if(!$_SESSION['loggedIn'])
  echo " you are not authorised<a href='http://www.books.engineerinme.com'>click to continue </a>";
    else 
    { require_once('./includes/incl_user.php');
  $sql="select username from book_users order by nobs desc";
  $result=mysqli_query($con,$sql);
  if(!$result)
    echo("Unable to Display");
  else
  {
  $bid=$_REQUEST['bid'];
  $_SESSION['bookid']=$bid;
  echo "Please have a look on your Peronnel details, if there is any" ;
  echo " mistake, do <a href='http://books.engineerinme.com/com-profile.php'>change them</a>\n<br />";
  $user=$_SESSION['user'];
  $sql1="SELECT * FROM `book_users` WHERE username='$user' ;";
  $result1=mysqli_query($con,$sql1);
  $row=mysqli_fetch_array($result1);
     echo("<h2><font color=RED>Email id:</font><font color=GREEN>".$row['email_id']."</h2>\n");
     echo("<h2><font color=RED>first name: </font><font color=GREEN>".$row['firstname']."</font></h2>\n");
     $buyername=$row['firstname'];
     echo("<h2><font color=RED>lastname: </font><font color=GREEN>".$row['lastname']."</h2>\n");
     echo("<h2><font color=RED>address line 1:</font><font color=GREEN>".$row['adr_line1']."</font></h2>\n");
     echo("<h2><font color=RED>address city: </font><font color=GREEN>".$row['adr_line2']."</font></h2>\n");
     echo("<h2><font color=RED>address country: </font><font color=GREEN>".$row['adr_coun']."</font></h2>\n");
     echo("<h2><font color=RED> phone: </font><font color=GREEN>".$row['phone']."</font></h2>\n");
     echo("<h2><font color=RED>username: </font><font color=GREEN>".$row['username']."</font></h2>\n");
   //  echo("<center><h1><a href='./pdf/invoice.php'>Download invoice </a></h2></center>");
       
       
       
  $sql11="SELECT * FROM `book_books` WHERE `book_id`='$bid';";
  $result12=mysqli_query($con,$sql11);
  if(!$result12)
    echo("Cannot show the required details!");
  else
    {
     $row1=mysqli_fetch_array($result12);
     
   $_SESSION['bookname']=$row1['bookname'];
   $_SESSION['bookcost']=$row1['price'];
   $_SESSION['seller']=$row1['username'];
     }
     echo "<h3><font color=RED >Book you have ordered:</font><font color=GREEN>".$_SESSION['bookname']."</font><br/></h3>";
     echo "<h3><font color=RED >Cost of book: </font><font color=GREEN>".$_SESSION['bookcost']."Rs</font></h3>";
    }
    $bookname=$_SESSION['bookname'];
    $bookcost=$_SESSION['bookcost'];
    $seller=$_SESSION['seller'];
     ?>
      
 
  
  <?php

     $user=$_SESSION['user'];
   
  //code to insert all abt the buyer and seller in db
   $sql123 = "INSERT INTO  book_invoice (`invoice no` ,`book name` ,`bookid` ,`seller name` ,`buyersname` ,`sold`)VALUES ('',  ' $bookname',  '$bid',  ' $seller',  '$user', 'sold')";
   $result1234=mysqli_query($con,$sql123);
   if (!$result1234)
   echo "unsuccessful try again";
   else
   {
   echo "<center><h3><font color=blue>Successful to enter Details in database</font></h3></center>";
   echo'<img src="./img/congrats.gif" />';
   
   
  
//    echo("<center><h1><a href='./pdf/invoice.php'>Download computer generated bill </a></h2></center>");
     $to = "booksinfo@engineerinme.com";
     $subject = "Hi!";
    $body = "
    sellers name=>".$seller."                     buyers name=> ". $buyername."                        book id =>".$bid." A book have been sold.please check the database 'book_invoice' for further details.Book have been sold now its the duty of admin to process the request further .Admin is requested to remove the book from the database and  generaate a bill and forward the bill an confirmation to the client <br />";
 if (mail($to, $subject, $body)) {
   echo("<p>Message successfully sent!</p>");
   echo "<center>A mail has been sent to our representative he would contact you soon to get confirmaton.. </center>";
  } else {
   echo("<p>Message delivery failed...</p>");
  }
    }
    }
  
   ?>