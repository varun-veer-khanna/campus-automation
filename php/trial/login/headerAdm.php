<?php
echo "<div class=header> ";
echo "<div class=headerlog>";
include('connect.php');



if(isset($_POST['username']))
{



$username=$_POST['username'];

echo "<b>Hello '$username'</b> ";
}
else
{
	echo "<h4><b>Hello Admin</b> </h4>";
}
echo "<a href=#>view records</a> &nbsp;&nbsp; <a href=#>edit records</a> &nbsp;&nbsp; <a href=#>Add Assignment</a> ";

echo "</div>";
echo "</div>";

?>