<?php
echo file_get_contents('http://localhost/php/trial/stylesheet_php/stylesheet.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/headerMain.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/hmenu.php');
//include('stylesheet.php');
//include('headerMain.php');
//include('hmenu.php');
echo "<link rel='stylesheet' type='text/css' href='menu.css' />";
echo "<script type='text/javascript' src='menu.js'></script>";
echo "<div class=main>";
echo "<div class=contact-about>";
echo"<br/>Postal Address
<br/><br/>
GSPN University,<br/>
AMRITSAR -GT ROAD (NH-1),<br/>
Punjab (India) - 143001
<br/><br/>
For General / Admission Related Enquiry:<br/>
Ph. +91-0183-404404<br/>
Fax: +91-0183-506100 (Admission)<br/>
Fax: +91-0183-506111 (General)<br/>
Toll Free: 1800 102 4431<br/>
<br/>
info@gspn.co.in(General)<br/>
admissions@gspn.co.in (Admissions)<br/>";
echo"</div>";
echo "</div>";

echo file_get_contents('http://localhost/php/trial/stylesheet_php/footer.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/left1.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/right.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/footer2.php');

//include('footer.php');
//include('left1.php');
//include('right.php');
//include('footer2.php');


?>