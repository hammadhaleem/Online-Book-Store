<?php
      require('./includes/incl_user.php');
      if($meta=="enlargebook")
      {
        require('./includes/incl_user.php');
        $sql1="select * from book_books where book_id=$bid";
        $result=mysqli_query($con,$sql1);
        if(!result)
          get_common_meta();
        else
          {
          $row=mysqli_fetch_array($result);
         echo("<meta name=\"Subject\" content=\"Buy ".$row['bookname']." by ".$row['authorsname']." at very low Prices\" />");
         echo("<meta name=\"Description\" content=\"Buy ".$row['book']." book by ".$row['authorsname'].".");
         if(!$row['price'])
         echo("Get this Book for free.");
         echo("The book is available at a low price of INR ".$row['price'].".");
         echo("\" />");
         echo("<meta name=\"Keywords\" content=\"".$row['bookname'].",".$row['edition']."th edition,".$row['authorsname'].","." buy / sell".$row['subject']." books,".$row['bookname']." by ".$row['authorsname'].", \" />");
         }
      }
     else
      get_common_meta();
function get_common_meta()
  {
  require('./includes/incl_user.php');

?>
     <meta name="Title" content="Engineer In Me Book Store" />	
     <meta name="Keywords" content="Engineer In Me Book Store, Donate Books, Buy old books, sell old books, buy sell used books, donate not in use old books, get books for free, online book store" />
     <meta name="Author" content="Engineer In Me Designers" />
     <meta name="Subject" content="Online portal to sell books" />
     <meta name="Description" content="EngineerInMe Book Sore is an online book store dedicated to help people buy and sell old books at very cheap prices and also to help people to share the books not in their use by giving them it free to those who may use it" />
<?php
     echo("<meta name=\"Keywords\" content=\"Second Hand Books Delhi, Second Hand Books India, Sell old Books, Old book sellers in Delhi, India, Online book store, purchase used books, sharing old books, online booksSecond Hand Books , buy sell old books india Books, where to buy books, from where to buy books, where to sell old used books, largest collection books india, discounted computer book, books shopping india, book services, indian publishers, wholesale book distributor, indian books,  Largest book shop india,  Biography Autobiography books, bookshop, book seller in India, all subjects books, travel books, indian cook book, books from india, book publisher in india, books shopping and services, wholesale book sellers, distributors india, discount books store, indian authors books,  Astrology books india, online book store india, book publishers india, philosophy books, book title and author, online discount books,utor in India, computer,");
     $sql1="select * from book_types";
     $result1=mysqli_query($con,$sql1);
     while($row=mysqli_fetch_array($result1))
     {
     echo("books on ".$row['book_type'].", ");
     echo("cheep books on ".$row['book_type'].", ");
     echo("Cheep book related to".$row['book_type'].", ");
     }
    echo("\" />\n");
  }
?>