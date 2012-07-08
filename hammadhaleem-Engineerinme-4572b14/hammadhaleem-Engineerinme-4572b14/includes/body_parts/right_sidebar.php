    <div class="sidebar_re">
				<div class="head_sidebar">
          Latest Book
				</div>
				<div class="body">
				  <?php
            require_once('./includes/functions/display_book.php');
            $sql="select book_id from book_books order by book_id desc";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result))
              $book_ids[]=$row['book_id'];
            display_book($book_ids[0]);
				  ?>
				</div>
			</div>
		<div class="sidebar_re">
    <?php
        if(!$_SESSION['loggedIn'])
        {
      ?>
				<div class="head_sidebar">
          Login/Register
				</div>
				<div class="body">
         <?php
              echo("<a href=\"login.php?login\"><img src=\"./img/login.png\" class=\"user\" alt=\"login\" title=\"Please Login\" /></a>");
              echo("<a href=\"register.php\"><img src=\"./img/register.png\" class=\"user\" alt=\"register\" title=\"Register\" /></a>\n");
            }
            else
            {
           ?>
              <div class="head_sidebar">
                <?php echo("HELLO ".strtoupper($_SESSION['user'])); ?>
		    		  </div>
      				<div class="body">
           <?php
            echo("<a href=\"index.php\"><img src=\"./img/home.png\" class=\"user\" alt=\"register\" title=\"Go to Home\" /></a>\n");
            echo("<a href=\"com-profile.php\"><img src=\"./img/register.png\" class=\"user\" alt=\"register\" title=\"Edit Profile\" /></a>\n");
             }
				  ?>
				</div>
			</div>
       <div class="sidebar_re">
        <div class="head_sidebar">
        Top book listers
        </div>
        <div class="body">
          <?php
            require('./includes/functions/top_sellers.php');
          ?>
        </div>
       </div>
       <div class="sidebar_re">
				<div class="head_sidebar">
          Follow Us
				</div>
				<div class="body">
          <a href="http://facebook.com/site.engineerinme" target="_blank"><img src="./img/facebook.png" /></a>
          <a href="http://twitter.com/#!engineerinmine" target="_blank"><img src="./img/twitter.png" /></a>
          <a href="http://www.linkedin.com/company/2090973" target="_blank"><img src="./img/linkedin.png" /></a>
				</div>
			</div>
       <div class="sidebar_re">
				<div class="head_sidebar">
          Share On Facebook
				</div>
				<div class="body">
				<?php
          $url=urlencode("http://books.engineerinme.com");
          echo("<a href=\"http://www.facebook.com/sharer/sharer.php?src=bm&u=".$url."\" target=\"_blank\"><img src=\"./img/share-fb.jpg\" /></a>");
        ?>
				</div>
			</div>