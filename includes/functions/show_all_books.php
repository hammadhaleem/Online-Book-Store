  
  
<?php
     require('./includes/incl_user.php');
 ?>
    
    
<table border="1" cellpadding="5" cellspacing="5" width="100%">
<tr>
<th colspan="2"><?php echo $message; ?></th>
</tr>
<tr>
<td width='30%'>Sno</td><td>book name</td><td>details</td></tr>
<?php 
$count=1;
$sql="select * from book_books";
  $result=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($result))
   
    $book_ids[]=$row['book_id'];
    foreach($book_ids as $book_id)
    {
  echo("<table>");
  
  
// print_r( $book_ids);
 ?>

<tr><?php echo "<td width='30%'>".$count ; ?></td><td >book name</td><td><?php echo "<a href=\"enlarge.php?.bid=".$book_id."\">".$book_id."details</td>"; ?> </tr>
 <?php
 $count++;
   }

?>
</table>