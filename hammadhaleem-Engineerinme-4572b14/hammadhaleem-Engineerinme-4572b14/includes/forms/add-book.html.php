<?php
  require_once('./includes/forms/login_form.php');
  if(!$_SESSION['loggedIn'])
    {
      echo("<center>You are not Authorised to see this page...<br />Please Login to continue...<br/></center>");
      show_login_form();
    }
  else
    {
?>
	<form action="checkbook.php" method="POST"  enctype="multipart/form-data" class="register" >
						Name of Book:<input type="text" name="bookname" size="20" id="bookname" />(eg Let Us C)<br />
						Authors' Name:<input type="text" name="authorsname" size="20" id="authorsname" />(eg Yashwant Kantekar)<br />
						Edition of Book:
            <select name="edition" id="edition">
              <?php
                for($i=1;$i<=100;$i++)
                  echo("<option value=\"".$i."\">".$i."</option>");
              ?>
            </select>
            (eg select 4 for 4th edition)<br />
						Condition:<input type="text" name="condition" size="20" id="condition" />(eg All most New)<br />
						Expected Price(INR):<input type="number" name="price" size="17" id="price" />(0 for free)<br />
						Field:
           <select name="field"  id="field" >
              <?php
                require('./includes/incl_user.php');
                $read_types="select * from book_types";
                $result1=mysqli_query($con,$read_types);
                if(!$result1)
                echo("EXIT");
                while($row=mysqli_fetch_array($result1))
                  echo('<option value="'.$row['type_id'].'">'.$row['book_type'].'</option>');
              ?>
           </select>
            <br />
						Subject:<input type="text" name="subject" size="23" id="subject" />(eg Fluid Mechanics)<br />
            Year most Recommended:
            <select name="year" id="year" >
              <option value="I Year">First Year</option>
              <option value="II Year">Second Year</option>
              <option value="III Year">Third Year</option>
              <option value="IV Year">Fourth Year</option>
              <option value="School">School Book</option>
              <option value="Everyone">General Purpose</option>
            </select>
            <br />
           
       
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
		
<?php
  }
?>