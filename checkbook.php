<?php
      session_start();
     
      $username=$_SESSION['user'];
			$bookname=$_POST['bookname'];
			$authorsname=$_POST['authorsname'];
			$edition=$_POST['edition'];
			$condition=$_POST['condition'];
			$price=$_POST['price'];
      $field=$_POST['field'];
			$subject=$_POST['subject'];
			$rec_year=$_POST['year'];
			$head_message="Something went Wrong";
   if($bookname=='')
      {
        $message="<center>You must supply the Name of the Book!<br />Click <a href=\"add-book.php\">Here</a> to try again...</center>";
        require('./includes/template.html.php');
        exit();
      }
    if($authorsname=='')
      {
        $message="<center>You must specify the Name of the Author(s)!<br /> Please write \"Unknown\" if you really don't know the names!<br />Click <a href=\"add-book.php\">Here</a> to try again...</center>";
        require('./includes/template.html.php');
        exit();
      }

      if($price<0)
      {
        $message="<center>Hehehe, how could price be negative!<br />Click <a href=\"add-book.php\">Here</a> to try again...</center>";
        require('./includes/template.html.php');
        exit();
      }
      if($price==NULL)
        $price=0;
        
      if($subject=='')
      {
        $message="<center>You must specify a Subject...<br />Click <a href=\"add-book.php\">Here</a> to try again...</center>";
        require('./includes/template.html.php');
        exit();
      }
      else
      {
     //file upload 
  /* 
  $filename=$_FILES["file"]["name"];*/
 // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  //echo "Type: " . $_FILES["file"]["type"] . "<br />";
  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  //echo "Stored in: " . $_FILES["file"]["tmp_name"];
  //$ext=end(explode('.',$filename));
 /* if($ext=='jpg'||$ext=='jpg'||$ext=='jpg'||$ext=='jpg')
  {*/
 //  $filename=time().$filename;
 //  $savepath='/upload/'.$filename;
  // echo $savepath;
  // $isupload=move_uploaded_file($_FILES["file"]["tmp_name"],"./includes/forms/upload/".$filename) or die("Failed to upload file");
   //echo "<hr>";
   // $savepath="./includes/forms/upload/".$filename. "<hr>";
  /*  echo $savepath;
   echo $isupload;
   if($isupload)
   {$msg='image uploaded';}
   else
   {$mgs='some error';}
   
   } */
    //end upload
  
        require_once('./includes/incl_user.php');
        $sql="insert into book_books(username,bookname,authorsname,edition,cond,price,type_id,subject,rec_year,ind_pic)
        values('$username','$bookname','$authorsname',$edition,'$condition','$price',$field,'$subject','$rec_year','$savepath')";
        //image
       
        
        $result=mysqli_query($con,$sql);
          if(!$result)
          {
            $message="<center>Cannot added...<br />Please let us <a href=\"contact-us.php\">know</a> about this...</center>";
            require('./includes/template.html.php');
            exit();
          }
          $username=$_SESSION['user'];
        $sql2="Update book_users set nobs=nobs+1 where username='$username'";   
        mysqli_query($con,$sql2);
        $head_message="All right Sparky...";
        $message="<center>Successfully added your Book<br/>Please return <a href=\"index.php\">Home</a> or <a href=\"add-book.php\">Add a new Book</a>...</center>";
        require('./includes/template.html.php');
        exit();
        }
?>