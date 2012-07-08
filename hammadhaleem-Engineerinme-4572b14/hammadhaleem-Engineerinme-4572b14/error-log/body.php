<body>
	<div class="header">
		<div class="header_re">
			<a href="../index.php"><img src="../img/logo.jpg" class="logo" /></a>
			<div class="header_re_form">
        <?php
        if(!$_SESSION['loggedIn'])
        {
        ?>
  				<span>Please Login:</span>
  	 			<form action="login.php" method=POST>
  	 				User name:<input type="text" name="username" size="10" id="username" />
  					Password:<input type="password" name="password" size="10" id="password" />
  					<input type="submit" value="login" />
  				</form>
				<br />
				<a href="register.php">Register Yourself</a>
				<?php
          }
        else
          {
            echo("<font color=\"GREEN\">Hello, ".$_SESSION['user']."</font>");
            echo("<br /><a href=\"../logout.php\">Log Out</a> ");
          }
         ?>
				<a href="../contact-us.php">Contact Us</a>
			</div>
		</div>
	</div>
	<div class="top_menu">
		<div class="top_menu_re">
			<ul>
				<li>
					<a href="../index.php">
						<img src="../img/home-green.jpg" alt="Home" />
					</a>
				</li>
				<li>
					<a href="http://engineerinme.com" target="_blank">Eim's home</a>
				</li>
				<li>
					<a href="http://updates.engineerinme.com" target="_blank">Updates</a>
				</li>
				<li>
					<a href="http://forum.engineerinme.com" target="_blank">Forum</a>
				</li>
                                <li>
				<a href="../contact-us.php">Contact Us</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="banner">
		<img src="../img/banner.gif" alt="Donate Books" class="banner_re" />
	</div>
	<div class="content_re">
		<div class="content_left">
      <?php
        require_once('./left_sidebar.php');      //left Sidebar
      ?>
		</div>
		<div class="content_center">
      <?php
        require('./main_content.php');     //main content
      ?>
		</div>
		<div class="content_right">
      <?php
    		require_once('./right_sidebar.php');      //right Sidebar
    	?>
    </div>
	</div>
	<div class="footer">
		Hello world explaination
	</div>
</body>
</html>