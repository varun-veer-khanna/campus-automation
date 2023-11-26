<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$server="localhost";
$uid="root";
$pwd="";
 
$con=mysql_connect($server,$uid,$pwd);
if($con)
{
	$mydb=mysql_select_db("mydb");
	if($mydb)
	{//echo "Database connected";
	return true;
	}
	else
	{
	//echo "database connection error";
	return false;
	}
}
else
{
return false;
//echo "server connection error";
}

?>