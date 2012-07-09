<?php

  function send_mail($to,$subject,$body,$from)
  {
    mail($to, $subject, $body, $from);
  }
?>