<?php
include('style.php');
include('head.php');
include('left.php');
echo "<div class='main'>";
$connection_status=include("connect.php");
if($connection_status)
{
 echo "<h1>Assignments</h1>";
 $student_id=$_REQUEST['student_id']; 
 $select_sql="select course_avail  from student where student_id=$student_id ";
 $query=mysql_query($select_sql);
 if($row=mysql_fetch_row($query))
 {$course=$row[0]; }
 $sql="select *  from assignment where course='$course' order by sr_no desc";
 $query1=mysql_query($sql);
 while($row_data=mysql_fetch_array($query1))
{
  echo "<div class='assign'>";
  echo 
	"<table>
	<tr><td><img src='project_form/small_folder.gif'/></td><td><b style='font-size:16pt;'>Assignment on $row_data[3]</b></td></tr>
	<tr><td></td><td><a href='$row_data[4]'>view</a>&nbsp &nbsp &nbsp<a href='#'>download</a></td></tr>";
	$uploaded_assign=$row_data[6];
	if($uploaded_assign=='')
	{echo"<tr><td></td><td><span class=err_msg>DUE DATE IS: $row_data[5]</span></td></tr>";}
	else
	{echo"<tr><td></td><td><span class=err_msg>Due date was $row_data[5]</span></td></tr>";}
	echo"</table>";	
   echo "</div>";
   $i +=1;		
} 
}
else
{
echo "connection error";
}
 
echo "</div>";
include('right.php');
include('foot.php');
?>
