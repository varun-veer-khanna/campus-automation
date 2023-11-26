<?php
include('style.php');
include('head.php');
include('left.php');
echo "<div class='main'>";

echo "<br/><br/><center><h1><font face='28 Days Later' color='cyan' size='8'>Assignment List</font></h1></center>";
$connection_status=include("connect.php");    
if($connection_status)
{
		//Filters
		echo "<br/><form action='upload.php' method='POST'>
				  <table width=100%><tr>
				<td><font face='astonished' size='6.5'>&nbsp;&nbsp;&nbsp;&nbsp;Semester:</font> <select name='fsemester'>
						<option value='UNKNOWN'>select...</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
						<option value='6'>6</option>
						<option value='7'>7</option>
						<option value='8'>8</option>
					</select></td>
				  
				<td><font face='astonished' size='6.5'>Course:</font> <select name='fcourse'>
									<option value='UNKNOWN'>select...</option>
									<option value='C'>C</option>
									<option value='C++'>C++</option>
									<option value='.NET'>.NET</option>
									<option value='PHP'>PHP</option>
									<option value='Java'>Java</option>
									<option value='Android'>Android</option>
									<option value='SQL'>SQL</option>
									<option value='Networking'>Networking</option>
									</select></td>
							</tr></table><br/>
				  <center>
                    <input type='submit' value='Submit'/>
				  </center>
			</form>
				  <br/><br/><hr/>";
		
		//List of Assignments
		
		if(isset($_POST['fsemester']) or isset($_POST['fcourse']))
		{
			$fsemester=$_POST['fsemester'];
			$fcourse=$_POST['fcourse'];
			
			if($fcourse=='UNKNOWN')
			{
				
				$sql="select * from Assignment where sem=$fsemester";
				$query=mysql_query($sql);
			}
			
			if($fsemester=='UNKNOWN')
			{
				
				$sql="select * from Assignment where course='$fcourse'";
				$query=mysql_query($sql);
			}
			
			echo "<table width=100% cellpadding='3'>
				<tr class='head'><tr><td><font face='Brandon Grotesque Bold'>Sr. No.</font></td>
									 <td><font face='Brandon Grotesque Bold'>Course</font></td>
									 <td><font face='Brandon Grotesque Bold'>Semester</font></td>
									 <td><font face='Brandon Grotesque Bold'>Topic</font></td>
									 <td><font face='Brandon Grotesque Bold'>Path</font></td>
									 <td><font face='Brandon Grotesque Bold'>Deadline</font></td>
								</tr>";
								
				$row_style="style1";
				
				while($row_data=mysql_fetch_array($query))
				{
					if($row_style=="style1"){$row_style="style2";}  
					else{$row_style="style1";}    
					
					echo 
					"<tr class='$row_style'>
					<td>$row_data[0]</td><td>$row_data[1]</td><td>$row_data[2]</td><td>$row_data[3]</td><td>$row_data[4]</td><td>$row_data[5]</td>
					</tr>";
					
				}
				echo "</table><br/><br/><br/><br/>";
		}
		
		
		else
		{
			$sql="select * from Assignment";
			$query=mysql_query($sql);
			echo "<table width=100% cellpadding='3'>
				<tr class='head'><tr><td><font face='Brandon Grotesque Bold'>Sr. No.</font></td>
									 <td><font face='Brandon Grotesque Bold'>Course</font></td>
									 <td><font face='Brandon Grotesque Bold'>Semester</font></td>
									 <td><font face='Brandon Grotesque Bold'>Topic</font></td>
									 <td><font face='Brandon Grotesque Bold'>Path</font></td>
									 <td><font face='Brandon Grotesque Bold'>Deadline</font></td>
								</tr>";
								
				$row_style="style1";
			
				while($row_data=mysql_fetch_array($query))
				{
					if($row_style=="style1"){$row_style="style2";}  
					else{$row_style="style1";}    
					
					echo 
					"<tr class='$row_style'>
					<td>$row_data[0]</td><td>$row_data[1]</td><td>$row_data[2]</td><td>$row_data[3]</td><td>$row_data[4]</td><td>$row_data[5]</td>
					</tr>";
					
				}
				echo "</table><br/><br/><br/><br/>";
		}
}
else
{echo "Connection Error";}
echo "</div>";
include('right.php');
include('foot.php');
?>