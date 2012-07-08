<?php
  function show_modification_form()
  {
  echo("<form action=\"?checkandsave\" method=POST />");
  echo("First Name:<input type=\"text\" name=\"firstname\" value=\"".$row['firstname']."\" size=\"25\" /><br />");
  echo("Last Name:<input type=\"text\" name=\"lastname\" value=\"".$row['lastname']."\" size=\"25\" /><br />");
  echo("Password:<input type=\"password\" name=\"password\" value=\"".$row['pwd']."\" size=\"25\" /><br />");
  echo("Repeat Password:<input type=\"text\" name=\"re_password\" value=\"\" size=\"25\" /><br />");
  echo("Email-id:<input type=\"email\" name=\"email_id\" value=\"".$row['email_id']."\" size=\"25\" /><br />");
  echo("Phone No.:<input type=\"text\" name=\"phone\" value=\"".$row['phone']."\" size=\"25\" /><br />");
  echo("College:<input type=\"text\" name=\"college\" value=\"".$row['college']."\" size=\"25\" /><br />");
  echo("Address: Line1:<input type=\"text\" name=\"adr_line1\" value=\"".$row['adr_line1']."\" size=\"20\" /><br />");
  echo("Line 2:<input type=\"text\" name=\"adr_line2\" value=\"".$row['adr_line2']."\" size=\"25\" /><br />");
  echo("City:<input type=\"text\" name=\"adr_city\" value=\"".$row['adr_city']."\" size=\"25\" /><br />");
  echo("State: <input type=\"text\" name=\"adr_state\" value=\"".$row['adr_state']."\" size=\"25\" /><br />");
  echo("Country:<input type=\"text\" name=\"adr_coun\" value=\"India\" size=\"25\" /><br />");
  echo("<input type=\"submit\" value=\"Save\" />");
  echo("</form>");
  }
?>