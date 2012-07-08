<?php
  function show_login_form()
  {
?>
  <center>
  <form action="login.php" method=POST>
  	 				User name:<input type="text" name="username" size="10" id="username" /><br />
  					Password:<input type="password" name="password" size="10" id="password" /><br />
  					<input type="submit" value="login" />
		</form>
	</center>
<?php
  }
?>