<?php
$upload_srno_list=null;
include("style.php");
include('head.php');
include("left.php");
echo "<div class='main'>";
$connection_status=include("connect.php");
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
	  { //echo "uploaded_assign=$uploaded_assign<br/>";
	    //print_r($uploaded_assign);
		$uploaded_name=$uploaded_assign['name'];
	    $newstudent_id=mysql_insert_id();
	    $path1=$uploaded_assign['tmp_name'];
        $uploaded_size=$uploaded_assign['size'];
        $uploaded_type=$uploaded_assign['type'];
        $uploaded_error=$uploaded_assign['error'];
	    $tmp_name=explode('.',$uploaded_name);
	    $len=count($tmp_name);
	    $path2="uploaded_assign/$student_id$sr_no".".".$tmp_name[$len-1];
	    move_uploaded_file($path1,$path2);
		$update_sql="update upload set uploaded_assign='$path2' where student_id=$student_id  and sr_no=$sr_no";
        mysql_query($update_sql);	    
		//echo "inserted";
	   }
	   else { echo "$insert_sql";}
	}
	else
	{// echo "uploaded_assign=$uploaded_assign<br/>";
	   // print_r($uploaded_assign);
		$uploaded_name=$uploaded_assign['name'];
	    $newstudent_id=mysql_insert_id();
	    $path1=$uploaded_assign['tmp_name'];
        $uploaded_size=$uploaded_assign['size'];
        $uploaded_type=$uploaded_assign['type'];
        $uploaded_error=$uploaded_assign['error'];
	    $tmp_name=explode('.',$uploaded_name);
	    $len=count($tmp_name);
	    $path2="uploaded_assign/$student_id$sr_no".".".$tmp_name[$len-1];
	    move_uploaded_file($path1,$path2);
		$update_sql="update upload set uploaded_assign='$path2' where student_id=$student_id and sr_no=$sr_no";
	  $update_query=mysql_query($update_sql);
	 /* if($update_query)
	  { echo "updated";}
	   else { echo "$update_sql";}*/
	}
 }
 echo "<center><h1>Assignments</h1></center><center>";
 if(isset($_POST['student_id'])||isset($_REQUEST['student_id']))
 {
  if(isset($_POST['student_id']))
  {$student_id=$_POST['student_id'];}
  else
  {$student_id=$_REQUEST['student_id'];}
 }
 $select_sql="select course_avail  from student where student_id=$student_id ";
 $query=mysql_query($select_sql);
 if($row1=mysql_fetch_row($query))
 {$course=$row1[0]; }
 $sql1="SELECT sr_no FROM `upload` WHERE student_id=$student_id";
 $query1=mysql_query($sql1);
 $num=mysql_num_rows($query1);
 //echo $num;
 if($num>0)
 {
 while($row=mysql_fetch_array($query1))
 {
 $upload_srno_list=$upload_srno_list.$row[0] .",";
 //echo $upload_srno_list;
 
 }

 $len=strlen($upload_srno_list);
 $upload_srno_list =substr($upload_srno_list,0,$len-1);
 $sql2="and sr_no not in($upload_srno_list)";
 }
 else
 {
 $sql2="";
 }

 
 $sql="SELECT sr_no,topic,assignment_link,deadline FROM `assignment` WHERE  course='$course' $sql2 order by sr_no desc";
 //echo "$sql2 <br/> $sql";
 $query1=mysql_query($sql);
 while($row_data=mysql_fetch_array($query1))
{
  
  //$select="select sr_no from upload where student_id=$student_id";
  //$query2=mysql_query($select);

  
  
  echo "<div class='assign'>";
  echo 	"<form action='assign.php' method='post' enctype='multipart/form-data'>
	<table>
	<tr><td><img src='project_form/small_folder.gif'/></td><td width='50%'><b style='font-size:16pt;'>Assignment on $row_data[1]</b></td>
	<td ><input  type='hidden' name='student_id' value='$student_id'/><input  type='hidden' name='sr_no' value='$row_data[0]'/><input  type='hidden' name='topic' value='$row_data[1]'/><input type='file' name='uploaded_assign'/></td></tr>
	<tr><td></td><td><a href='$row_data[3]'>view</a>&nbsp &nbsp &nbsp<a href='#'>download</a></td><td><input  type='submit' value='Upload assignment'/></td></tr>";
	$uploaded_assign=$row_data[6];
	echo"<tr><td></td><td><span class=err_msg>DUE DATE IS: $row_data[3]</span></td></tr>";
	echo"</table>";	
	echo"</form>";	
	
   echo "</div>";
  //////
  
 } 
 echo "</center>";

if($upload_srno_list!=0)
{
 $sql="SELECT sr_no,topic,assignment_link,deadline FROM `assignment` WHERE  sr_no in($upload_srno_list) order by sr_no desc";
 //echo "$sql";
 $query1=mysql_query($sql);
 echo "<center><h2>Uploaded Assignments</h2><center>";
 while($row_data=mysql_fetch_array($query1))
{
  
  //$select="select sr_no from upload where student_id=$student_id";
  //$query2=mysql_query($select);
  
  echo "<div class='assign'>";
  echo 	"<form action='assign.php' method='post' enctype='multipart/form-data'>
	<table>
	<tr><td><img src='project_form/small_folder.gif'/></td><td width='50%'><b style='font-size:16pt;'>Assignment on $row_data[1]</b></td>
	<td ><input  type='hidden' name='student_id' value='$student_id'/><input  type='hidden' name='sr_no' value='$row_data[0]'/>
	<input  type='hidden' name='topic' value='$row_data[1]'/><input type='file' name='uploaded_assign'/></td></tr>
	<tr><td></td><td><a href='$row_data[2]'>view</a>&nbsp &nbsp &nbsp<a href='#'>download</a></td>
	<td><input  type='submit' value='Upload assignment again'/></td></tr>";
	$uploaded_assign=$row_data[6];
	echo"<tr><td></td><td><span class=err_msg>DUE DATE IS: $row_data[3]</span></td></tr>";
	
	echo"</table>";	
	echo"</form>";	
	
   echo "</div>";
  //////
 }
 }
 $upload__srno_list='';

echo "</div>"; 

}
else
{
echo "connection error";
}
echo "</div>";

include('right.php');
include('foot.php');

?>zz