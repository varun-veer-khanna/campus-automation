<?php
$server="localhost";
$uid="root";
$pwd="";
 
$con=mysql_connect($server,$uid,$pwd);
if($con)
{
	$mydb=mysql_select_db("mynewdb2");
	if($mydb)
	{
	
	return true;
	}
	else
	{
	echo "database connection error";
	return false;
	}
}
else
{
return false;
echo "server connection error";
}

?>