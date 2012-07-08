<div class="sidebar_re">
				<div class="head">
          <?php
            echo($head_message);
          ?>
				</div>
				<div class="body">
          <?php
            if($message=="register_yourself")
              require('./includes/register_yourself.php');
            else if($message=="add_book_form")
              require('./includes/forms/add-book.html.php');
            else if($message=="show_new_books")   
              require('./includes/functions/show_new_books.php');
            else if($message=="show_enlarged_book")
              require('./includes/functions/show_book_details.php');
            else if($message=="show_user_details")
               require('./includes/functions/show_user_details.php');
            else if($message=="search_books")
               require('./includes/functions/search_books.php');
            else if($message=="contact_us")
               require('./includes/forms/contact_us.php');
            else if($message=="complete_profile")
               require('./includes/forms/complete_profile.php');
            else if($message=="show_all_books")
               require('./includes/functions/show_all_books.php');
            else if($message=="show_book_reviews")
               require('./includes/functions/show_reviews.php');
            else if($message=="confirm")
		       require('./includes/functions/confirm.php');
            else if($message=="buy_book")
		       require('./includes/functions/buy_book.php');
	    else if ($message=="how_it_works")
	             require('./includes/functions/work.php');
            else if($message=="login_success")
                {
                echo("<center>Successfully logged in..<br />Click <a href=\"index.php\">Here</a> to coninue..</center>");
                die(3);
                header("location:index.php");
                }
            else if($message=="show_login_form")
                {
               require('./includes/forms/login_form.php');
               show_login_form();
               }
            else if($message=="not_logged_in")
               {
               require('./includes/forms/login_form.php');
               echo("<center>Unable to login...<br />Please Try Again..<br /><br /></center>");
               show_login_form();
               }
            else
              echo($message);
          ?>
				</div>
</div>