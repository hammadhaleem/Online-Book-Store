<?php
  include_once('./functions/search_books_func.php');
  $search_id=$_POST['search_type'];
  $key=$_POST['keyword'];
  if(($search_id==1)||($search_id=='Book Name'))
      search_by_name($key);
    if(($search_id==2)||($search_id=='Author Name'))
      search_by_author($key);
    if(($search_id==3)||($search_id=='Subject wise'))
      search_by_subject($key);
    if(($search_id==4)||($search_id=='User Name'))
      serach_by_user($key);
    if($search_id==5)
      serach_by_categoy($key);
    if($search_id==6)
      serach_by_range($key);
?>