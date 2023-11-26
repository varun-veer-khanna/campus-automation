<?php
include("mystyle.php");
include("leftmenu.php");
echo "<div class='main'>";
$connection_status=include("db_connection.php");
if($connection_status)
{
 if(isset($_FILES['uploaded_assign']))
 {
    $sr_no=$_POST['sr_no'];
	$uploaded_assign=$_FILES['uploaded_assign'];
    $update_sql= "update assignment set uploaded_assign='$uploaded_assign' where sr_no=$sr_no";
	$update_query=mysql_query($update_sql);
	if($update_query)
	{ echo "updated";}
	else { echo "$update_sql";}
 }
 echo "<h1>Upload</h1>";

 $student_id=$_REQUEST['student_id']; 
 $select_sql="select course_avail  from student where student_id=$student_id ";
 $query=mysql_query($select_sql);
 if($row=mysql_fetch_row($query))
 {$course=$row[0]; }
 $sql="select *  from assignment where course='$course' and uploaded_assign='' order by sr_no desc";
 $query=mysql_query($sql);
 $i=1;
 while($row_data=mysql_fetch_array($query))
{
  echo "<div class='assign'>";
  echo 
	"<form action='upload.php' method='post' enctype='multipart/form-data'>
	<table>
	<tr><td ><img src='project_form/small_folder.gif'/></td><td><b style='font-size:16pt;'>Assignment on $row_data[3]</b></td>
	<td ><input  type='hidden' name='sr_no' value='$row_data[0]'/> <input type='file' name='uploaded_assign'/><br/></td></tr>";
	echo "<tr><td></td><td></td><td><input  type='submit' value='upload assignment'/> </td></tr>";
	echo"</table>";	
   echo "</div>";
}
}
else
{
echo "connection error";
}

?>