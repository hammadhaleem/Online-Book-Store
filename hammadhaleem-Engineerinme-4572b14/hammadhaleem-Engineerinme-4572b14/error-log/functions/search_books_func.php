<?php

      function display_books($book_ids)
      {
        include_once('./functions/display_book.php');
        if($book_ids!=NULL)
        {
        echo("<table>");
        $count=1;
          foreach($book_ids as $book_id)
          {
            if($count%3==1)
              echo("<tr>");
            echo("<td>");
            display_book($book_id);
            echo("</td>");
            if($count%3==0)
              echo("</tr>");
            $count++;
          }
       echo("</table>");
        }
       else
        echo("<center><b>No such Books Found..Please try again..</b></center>");
      }
      
      function search_by_name($key)
      {
          $sql="select book_id from book_books where bookname like '%$key%' order by book_id desc";
          $result=mysqli_query($GLOBALS['con'],$sql);
          while($row=mysqli_fetch_array($result))
            $book_ids[]=$row['book_id'];
            display_books($book_ids);
      }
      
      function search_by_author($key)
      {
          $sql="select book_id from book_books where authorsname like '%$key%'order by book_id desc";
          $result=mysqli_query($GLOBALS['con'],$sql);
          while($row=mysqli_fetch_array($result))
            $book_ids[]=$row['book_id'];
            display_books($book_ids);
      }
      
      function search_by_subject($key)
      {
          $sql="select book_id from book_books where subject like '%$key%' order by book_id desc";
          $result=mysqli_query($GLOBALS['con'],$sql);
          while($row=mysqli_fetch_array($result))
            $book_ids[]=$row['book_id'];
          display_books($book_ids);
      }
      
      function serach_by_user($key)
      {
          $sql="select book_id from book_books where username like '%$key%' order by book_id desc";
          $result=mysqli_query($GLOBALS['con'],$sql);
          while($row=mysqli_fetch_array($result))
            $book_ids[]=$row['book_id'];
          display_books($book_ids);
      }
      
      function serach_by_categoy($key)
      {
          $sql="select book_id from book_books where type_id=$key order by book_id desc";
          $result=mysqli_query($GLOBALS['con'],$sql);
          while($row=mysqli_fetch_array($result))
            $book_ids[]=$row['book_id'];
          display_books($book_ids);
      }
      
      function serach_by_range($key)
      {
          switch($key)
          {
             case(0):
             {
                $min=0;
                $max=0;
             }
             break;
             case(1):
             {
                $min=1;
                $max=50;
             }
             break;
             case(2):
             {
                $min=51;
                $max=100;
             }
             break;
             case(3):
             {
                $min=101;
                $max=200;
             }
             break;
             case(4):
             {
                $min=201;
                $max=100000;
             }
             break;
          }
          $sql="select book_id from book_books where price>=$min and price<=$max order by book_id desc";
          $result=mysqli_query($GLOBALS['con'],$sql);
          while($row=mysqli_fetch_array($result))
            $book_ids[]=$row['book_id'];
          display_books($book_ids);
      }

?>