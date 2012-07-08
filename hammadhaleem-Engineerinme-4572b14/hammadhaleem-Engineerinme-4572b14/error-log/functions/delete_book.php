<?php
  require_once('./functions/display_book.php');
  display_book($bid,0); //0=Not show delete button

?>
  <center><form action="?confirm" method=POST >
<?php
    echo("<input type=\"hidden\" name=\"bid\" value=\"".$bid."\" />");
?>
    <input type="submit" name="confirm_delete" value="YES" />
    <input type="submit" name="confirm_delete" value="NO" />
  </form>
 </center>