<?php
require('gettitle.php');  /*To be edited!*/
echo('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
echo('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"/>');
echo('<head>');
echo('<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');
echo('<meta http-equiv="Content-Language" content="en" />');
echo('<link rel="stylesheet" type="text/css" href="style.css"/>');
echo("<meta name=\"robots\" content=\"NOODP,NOYDIR\" />");
require('meta_details.php');
echo('<title>'.$title.'</title>');
echo('</head>');
?>