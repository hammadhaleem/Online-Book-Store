
		<div class="sidebar_re">
				<div class="head_sidebar">
          Find a User
				</div>
				<div class="body">
				<form action="./">
				Select User:<select name="username">
				<?php
          $sql="select username from book_users";
          $result=mysqli_query($GLOBALS['con'],$sql);
          if(!$result)
            echo("Unable to select");
          else
            {
              while($row=mysqli_fetch_array($result))
              echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
            }
				?>
				</select>
				<input type="submit" value="Select" />
				</form>
				</div>
			</div>
    <div class="sidebar_re">
				<div class="head_sidebar">
          Latest Book
				</div>
				<div class="body">
				  <?php
            require_once('./functions/display_book.php');
            $sql="select book_id from book_books order by book_id desc";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result))
              $book_ids[]=$row['book_id'];
            display_book($book_ids[0]);
				  ?>
				</div>
			</div>
       <div class="sidebar_re">
				<div class="head_sidebar">
          Follow Us
				</div>
				<div class="body">
          <a href="http://facebook.com/site.engineerinme" target="_blank"><img src="../img/facebook.png" /></a>
          <a href="http://twitter.com/#!engineerinmine" target="_blank"><img src="../img/twitter.png" /></a>
          <a href="http://linkedin.com" target="_blank"><img src="../img/linkedin.png" /></a>
				</div>
			</div>
       <div class="sidebar_re">
				<div class="head_sidebar">
          Share On Facebook
				</div>
				<div class="body">
				<?php
          $url=urlencode("http://books.engineerinme.com");
          echo("<a href=\"http://www.facebook.com/sharer/sharer.php?src=bm&u=".$url."\" target=\"_blank\"><img src=\"../img/share-fb.jpg\" /></a>");
        ?>
				</div>
			</div>