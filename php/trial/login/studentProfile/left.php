<div class="left">
	<div class="pic">
	<?php
	include("connect.php");
	$student_id=$_REQUEST['student_id'];
	$sql="select student_img from student where student_id=$student_id";
	$query=mysql_query($sql);
    if($row1=mysql_fetch_row($query))
    {$image=$row1[0];	}
	echo "<img src='$image'/>";
	
	?>
	</div>
	<div class="leftmenu">
		<ul>
	
<?php
echo "
<li><a class='classname' href='indexSTU.php?student_id=$student_id'>Home</a></li> <br/>
<li><a class='classname' href='grade.php?student_id=$student_id'>Marks</a></li> <br/>";
//<li><a class='classname' href='new/viewassign.php?student_id=$student_id'>Assignments</a></li> <br/>
//<li><a class='classname' href='upload.php?student_id=$student_id'>Downloads</a></li> <br/>
?>

		</ul>
	</div>
</div>