<?php
  require('./includes/incl_user.php');
  
      function display_books($book_ids)
      {
        if($book_ids!=NULL)
        {
        $lim_max=$GLOBALS['id']*12;
        $lim_min=$lim_max-12;
        echo("<table>");
        $count=1;
          for($i=$lim_min;$i<$lim_max;$i++)
          {
            if($count%3==1)
              echo("<tr>");
            echo("<td>");
            if($book_ids[$i]!=NULL)
            display_book($book_ids[$i]);
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
          $count=0;
          require('./includes/incl_user.php');
          $sql="select book_id from book_books where bookname like '%$key%' order by book_id desc";
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($result))
          {
            $book_ids[]=$row['book_id'];
            $count++;
          }
            display_books($book_ids);
            return $count;
      }
      
      function search_by_author($key)
      {
          $count=0;
          require('./includes/incl_user.php');
          $sql="select book_id from book_books where authorsname like '%$key%'order by book_id desc";
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($result))
          {
            $book_ids[]=$row['book_id'];
            $count++;
          }
            display_books($book_ids);
            return $count;
      }
      
      function search_by_subject($key)
      {
          $count=0;
          require('./includes/incl_user.php');
          $sql="select book_id from book_books where subject like '%$key%' order by book_id desc";
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($result))
          {
            $book_ids[]=$row['book_id'];
            $count++;
          }
            display_books($book_ids);
            return $count;
      }
      
      function serach_by_user($key)
      {
          $count=0;
          require('./includes/incl_user.php');
          $sql="select book_id from book_books where username like '%$key%' order by book_id desc";
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($result))
          {
            $book_ids[]=$row['book_id'];
            $count++;
          }
            display_books($book_ids);
            return $count;
      }
      
      function serach_by_categoy($key)
      {
          $count=0;
          require('./includes/incl_user.php');
          $sql="select book_id from book_books where type_id=$key order by book_id desc";
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($result))
          {
            $book_ids[]=$row['book_id'];
            $count++;
          }
            display_books($book_ids);
            return $count;
      }
      
      function serach_by_range($key)
      {
          $count=0;
          require('./includes/incl_user.php');
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
          $result=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($result))
          {
            $book_ids[]=$row['book_id'];
            $count++;
          }
            display_books($book_ids);
            return $count;
      }

?>