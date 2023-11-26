<?php
include("style.php");
include('head.php');
include("left.php");
echo "<div class='main'>";
echo "<center><h1>Your Marks</h1></center><br/>";
$connection_status=include("connect.php");
if($connection_status)
{
  if(isset($_REQUEST['student_id']))
	{
		$student_id=$_REQUEST['student_id'];
		$sql="select * from grade where student_id=$student_id";
		$query_result=mysql_query($sql);
		if(mysql_query($sql))
		{
		    echo"
				<table cellpadding='4' border='1' align='center'>
                <tr><th rowspan=2>Subject</th><th colspan=5>Internal</th><th rowspan=2>External</th></tr>
				<tr><th>MST</th><th>Assignments</th><th>Projects</th><th>Seminars</th><th>Others</th></tr>";
			$row_style="style1";
			while($rows=mysql_fetch_array($query_result))
			{
				if($row_style=="style1"){$row_style="style2";}  //Style1 define
			    else{$row_style="style1";}    //Style2 define
               echo" <tr class='style1'><td>$rows[1]</td>
                <td>$rows[2]</td>
                <td>$rows[3]</td>
                <td>$rows[4]</td>
                <td>$rows[5]</td>
                <td>$rows[6]</td>
                <td>$rows[7]</td>
         
               </tr>";
	       
            } echo "</table>";	
		}
		
		
		else
		{
		echo "error <br/>$sql";
		}
	}
	
	
	
}
else
{
echo "connection error";
}
 
echo "</div>";

include('right.php');
include('foot.php');

?>zz