		<div class="sidebar_re">
				<div class="head_sidebar">
          Search Books
				</div>
				<div class="body">
          <form action="?search_books" method=POST>
            Search By:
              <select name="search_type" id="search_type">
                <option value="1">Book Name</option>
                <option vlaue="2">Author Name</option>
                <option vlaue="3">Subject wise</option>
                <option vlaue="4">User Name</option>
                <option vlaue="0">Random Search</option>
              </select><br />
            Keyword:<input type="text" name="keyword" id="keyword" size="16" /><br />
            <center><input type="image" src="../img/search.gif" /></center>
          </form>
				</div>
			</div>
			<div class="sidebar_re">
				<div class="head_sidebar">
          Search by Category
				</div>
				<div class="body">
          <form action="?search_books" method=POST>
             <input type="hidden" name="search_type" value="5" id="search_by_category" />
              Choose category:
              <select name="keyword" id="search_type">
                <?php
                  require_once('../includes/incl_user.php');
                  $sql="select * from book_types";
                  $result=mysqli_query($con,$sql);
                  if(!$result)
                    echo("There may be some Problem, We are not able to perform this search");
                  else
                  {
                    while($row=mysqli_fetch_array($result))
                      echo("<option value=\"".$row['type_id']."\">".$row['book_type']."</option>");
                  }
                  ?>
                </select>
            <center><input type="image" src="../img/search.gif" /></center>
          </form>
				</div>
			</div>
      <div class="sidebar_re">
				<div class="head_sidebar">
          Special Prices
				</div>
				<div class="body">
          <form action="?search_books" method=POST>
            Select Range:<br />
              <select name="keyword" size="5" id="search_type">
                <option value="0"> Free Books</option>
                <option value="1"> Rs.1 to Rs.50</option>
                <option value="2"> Rs.50 to Rs.100</option>
                <option value="3"> Rs.100 to Rs.200</option>
                <option value="4"> Above Rs.200</option>
              </select>
                <input type="hidden" name="search_type" value="6" id="search_by_range" />
            <center><input type="image" src="../img/search.gif" /></center>
          </form>
				</div>
			</div>
			<div class="sidebar_re">
				<div class="head_sidebar">
          Powered By:
				</div>
				<div class="body">
          <a href="http://engineerinme.com"><img src="../img/eim.jpg" height="200" /></a>
				</div>
			</div>