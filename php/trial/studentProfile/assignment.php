<?php
include("style.php");
include("left.php");
include("head.php");
echo "<div class='main'>";
$connection_status=include("db_connection.php");
if($connection_status)
{
 if(isset($_FILES['uploaded_assign'] ))
 {  
    $student_id=$_POST['student_id'];
	$sr_no=$_POST['sr_no'];
    $topic=$_POST['topic'];
	
	$uploaded_assign=$_FILES['uploaded_assign'];
	
	$select_sql="select uploaded_assign  from upload where sr_no=$sr_no and student_id=$student_id ";
    $query=mysql_query($select_sql);
    if($row1=mysql_fetch_row($query))
    {$upload=$row1[0];	}
	if($upload=='')
	{
	  $sql="select uploaded_assign from upload where topic='$topic'";
      $insert_sql= "insert into upload(sr_no,student_id,topic) values($sr_no,$student_id,'$topic')";
	  $insert_query=mysql_query($insert_sql);
	  if($insert_query)
	  { echo "uploaded_assign=$uploaded_assign<br/>";
	    print_r($uploaded_assign);
		$uploaded_name=$uploaded_assign['name'];
	    $newstudent_id=mysql_insert_id();
	    $path1=$uploaded_assign['tmp_name'];
        $uploaded_size=$uploaded_assign['size'];
        $uploaded_type=$uploaded_assign['type'];
        $uploaded_error=$uploaded_assign['error'];
	    $tmp_name=explode('.',$uploaded_name);
	    $len=count($tmp_name);
	    $path2="uploaded_assign/$sr_no".".".$tmp_name[$len-1];
	    move_uploaded_file($path1,$path2);
		$update_sql="update upload set uploaded_assign='$path2' where student_id=$student_id  and sr_no=$sr_no";
        mysql_query($update_sql);	    
		echo "inserted";
	   }
	   else { echo "$insert_sql";}
	}
	else
	{ echo "uploaded_assign=$uploaded_assign<br/>";
	    print_r($uploaded_assign);
		$uploaded_name=$uploaded_assign['name'];
	    $newstudent_id=mysql_insert_id();
	    $path1=$uploaded_assign['tmp_name'];
        $uploaded_size=$uploaded_assign['size'];
        $uploaded_type=$uploaded_assign['type'];
        $uploaded_error=$uploaded_assign['error'];
	    $tmp_name=explode('.',$uploaded_name);
	    $len=count($tmp_name);
	    $path2="uploaded_assign/$sr_no".".".$tmp_name[$len-1];
	    move_uploaded_file($path1,$path2);
		$update_sql="update upload set uploaded_assign='$path2' where student_id=$student_id and sr_no=$sr_no";
	  $update_query=mysql_query($update_sql);
	  if($update_query)
	  { echo "updated";}
	   else { echo "$update_sql";}
	}
 }
 echo "<h1>Assignments</h1>";
 $student_id=$_REQUEST['student_id'];
 $select_sql="select course_avail  from student where student_id=$student_id ";
 $query=mysql_query($select_sql);
 if($row1=mysql_fetch_row($query))
 {$course=$row1[0]; }
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
 if($flag==true)
 {
  echo 	"<form action='assign.php' method='post' enctype='multipart/form-data'>
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
 }
 $sql="select *  from assignment where course='$course' order by sr_no desc";
 $query1=mysql_query($sql);
 echo "<div class='assign'>";
 echo "<form action='assign.php' method='post' enctype='multipart/form-data'>
	<table border='1'><tr><th><h1>Assignments that has been uploaded</h1></th></tr><tr><td><table>";
 while($row_data=mysql_fetch_array($query1))
{
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
 if($flag==false)
 {
  echo"
	<tr><td><img src='project_form/small_folder.gif'/></td><td width='50%'><b style='font-size:16pt;'>Assignment on $row_data[3]</b></td>
	<td ><input  type='hidden' name='student_id' value='$student_id'/><input  type='hidden' name='sr_no' value='$row_data[0]'/><input  type='hidden' name='topic' value='$row_data[3]'/><input type='file' name='uploaded_assign'/></td></tr>
	<tr><td></td><td><a href='$row_data[4]'>view</a>&nbsp &nbsp &nbsp<a href='#'>download</a></td><td><input  type='submit' value='upload assignment'/></td></tr>";
	$uploaded_assign=$row_data[6];
	echo"<tr><td></td><td><span class=err_msg>DUE DATE : $row_data[5]</span></td></tr>";
   }
 }
 echo"</table></td></tr>"; 
 echo"</table>";	
	echo"</form>";	
}
else
{
echo "connection error";
}
echo "</div>";


include('right.php');
//include('foot.php');
?>