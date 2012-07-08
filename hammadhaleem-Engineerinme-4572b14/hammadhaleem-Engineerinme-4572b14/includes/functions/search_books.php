<?php
   require('./includes/incl_user.php');
   require_once('./includes/functions/display_book.php');
   require_once('./includes/functions/search_books_func.php');
   require_once('./includes/functions/display_page_nos.php');
    if(($search_id==1)||($search_id=='Book Name'))
      $count=search_by_name($key);
    if(($search_id==2)||($search_id=='Author Name'))
      $count=search_by_author($key);
    if(($search_id==3)||($search_id=='Subject wise'))
      $count=search_by_subject($key);
    if(($search_id==4)||($search_id=='User Name'))
      $count=serach_by_user($key);
    if($search_id==5)
      $count=serach_by_categoy($key);
    if($search_id==6)
      $count=serach_by_range($key);
      
  /*  $no_pages=ceil($count/12);
   show_page_nos($no_pages);*/
?>