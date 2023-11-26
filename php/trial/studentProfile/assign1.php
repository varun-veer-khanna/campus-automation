<?php
include("mystyle.php");
include("leftmenu.php");
echo "<div class='main'>";
$connection_status=include("db_connection.php");
if($connection_status)
{
 if(isset($_FILES['uploaded_assign']))
 {
    $student_id=$_POST['student_id'];
	$sr_no=$_POST['sr_no'];
    $topic=$_POST['topic'];////
	//////
	$uploaded_assign=$_FILES['uploaded_assign'];
	///////
	$sql="select uploaded_assign from upload where topic='$topic'";
    $insert_sql= "insert into upload(sr_no,student_id,topic,uploaded_assign) values($sr_no,$student_id,'$topic','$uploaded_assign')";
	$insert_query=mysql_query($insert_sql);
	if($insert_query)
	{ echo "inserted";}
	else { echo "$insert_sql";}
 }
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
  $select="select sr_no from upload where student_id=$student_id";
  $query2=mysql_query($select);
  while($row=mysql_fetch_array($query2))
 {
  if($row[0]==$row_data[0])
  {
  $flag=false;
  break;
  }
  else
  {
  $flag=true;
  }
 }
 if($flag==true){
  echo 
    
	"<form action='assign1.php' method='post' enctype='multipart/form-data'>
	<table>
	<tr><td><img src='project_form/small_folder.gif'/></td><td width='50%'><b style='font-size:16pt;'>Assignment on $row_data[3]</b></td>
	<td ><input  type='hidden' name='student_id' value='$student_id'/><input  type='hidden' name='sr_no' value='$row_data[0]'/><input  type='hidden' name='topic' value='$row_data[3]'/><input type='file' name='uploaded_assign'/></td></tr>
	<tr><td></td><td><a href='$row_data[4]'>view</a>&nbsp &nbsp &nbsp<a href='#'>download</a></td><td><input  type='submit' value='upload assignment'/></td></tr>";
	$uploaded_assign=$row_data[6];
	if($uploaded_assign=='')
	{echo"<tr><td></td><td><span class=err_msg>DUE DATE IS: $row_data[5]</span></td></tr>";}
	else
	{echo"<tr><td></td><td><span class=err_msg>Due date was $row_data[5]</span></td></tr>";}
	echo"</table>";	
	echo"</form>";	
	
   echo "</div>";
   $i +=1;		
  }
  else
  {echo"<form action='assign1.php' method='post' enctype='multipart/form-data'>
	<table border='1'>
	<tr><td><img src='project_form/small_folder.gif'/></td><td width='50%'><b style='font-size:16pt;'>Assignment on $row_data[3]</b></td>
	<td ><input  type='hidden' name='student_id' value='$student_id'/><input  type='hidden' name='sr_no' value='$row_data[0]'/><input  type='hidden' name='topic' value='$row_data[3]'/><input type='file' name='uploaded_assign'/></td></tr>
	<tr><td></td><td><a href='$row_data[4]'>view</a>&nbsp &nbsp &nbsp<a href='#'>download</a></td><td><input  type='submit' value='upload assignment'/></td></tr>";
	$uploaded_assign=$row_data[6];
	echo"<tr><td></td><td><span class=err_msg>DUE DATE : $row_data[5]</span></td></tr>";
	echo"</table>";	
	echo"</form>";	
   }

 }
}
else
{
echo "connection error";
}
echo "</div>";
 


?>