<?php
  function show_page_nos($page_no)
  {
    echo('<center>');
    echo('<ul class="page_nos">');
      for($i=1;$i<=$page_no;$i++)
        echo('<li><a href="?id='.$i.'">'.$i.'</a></li>');
    echo('</ul>');
    echo('</center>');
  }
?>