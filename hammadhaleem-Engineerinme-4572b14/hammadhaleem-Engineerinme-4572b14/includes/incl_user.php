<?php
  $con=mysqli_connect('localhost','jmifetco_books','books4everyone') or die("Cannot connect to DB ");
    mysqli_select_db($con,"jmifetco_book_1")or die("cannot select DB");
?>