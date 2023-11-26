<?php
include("mystyle.php");
include_once("script.php");
include("head.php");
include("mainmenu.php");
include("leftmenu.php");
echo "<div class='main'>";
echo "<center><h1>Insert</h1></center>";
$connection_status=include("db_connection.php");
if($connection_status)
{
			//
			
			echo "demo code";
}
else
{
echo "connection error";
}
 
echo "</div>";
include("addwindow.php");
include("footer.php");
?>