<?php
ob_start();
include('style.php');
include('head.php');
include('left.php');

echo "<div class='main'>";

echo "<br/><br/><center><h1><font face='28 Days Later' color='cyan' size='8'>Download Assignment</font></h1></center><br/>";
$con=include('connect.php');

if($con)
	{
		if(isset($_POST['course']))  
			{
				$course=$_POST['course'];
				$sem=$_POST['sem'];
				$topic=$_POST['topic'];
				
				$day=$_POST['day'];
				$month=$_POST['month'];
				$year=$_POST['year'];
				$deadline=$day.'/'.$month.'/'.$year;
				
				//PDF Upload
				$pdf=$_FILES['pdf'];
				$pdfname=$pdf['name'];
				$path1=$pdf['tmp_name'];
				$temp_name=explode(".",$pdfname);
				$len=count($temp_name);
				
				$insert_query="insert into Assignment(Course, Sem, Topic, deadline) values('$course', $sem, '$topic', '$deadline')";
				
				if(mysql_query($insert_query))
				{
						$path2="pdf/$topic".".".$temp_name[$len-1];
						
						move_uploaded_file($path1,$path2);	
						$sql="update Assignment set assignment_link='$path2' where topic='$topic'";
						$query=mysql_query($sql);
						if(!$query)
						{echo "Saving Error <br/>$insert_query";}
				}
			}
		
		//New Assignment Form
		echo
		"<form action='upload.php' method='post' enctype='multipart/form-data'>
		<table>
		<tr><td><font face='astonished' size='6.5'>Course:</font> </td>
		<td>
			<select name='course'>
				<option value='UNKNOWN'>select...</option>
				<option value='C'>C</option>
				<option value='C++'>C++</option>
				<option value='.NET'>.NET</option>
				<option value='PHP'>PHP</option>
				<option value='Java'>Java</option>
				<option value='Android'>Android</option>
				<option value='SQL'>SQL</option>
				<option value='Networking'>Networking</option>
			</select>
		</td></tr>
		
		<tr><td><font face='astonished' size='6.5'>Semester:</font> </td>
		<td>
			<select name='sem'>
				<option value='UNKNOWN'>select...</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
				<option value='6'>6</option>
				<option value='7'>7</option>
				<option value='8'>8</option>
			</select>
		</td></tr>
		<tr><td><font face='astonished' size='6.5'>Topic:</font> </td><td><input type='text' name='topic'></td></tr>
		
		<tr><td><font face='astonished' size='6.5'>Submission Date:</font> </td><td><b>Day</b>
									<select name='day'>
                                                <option value='UNKNOWN'>select...</option>
                                                <option value='1'>1</option><option value='2'>2</option>
                                                <option value='3'>3</option><option value='4'>4</option>
                                                <option value='5'>5</option><option value='6'>6</option>
                                                <option value='7'>7</option><option value='8'>8</option>
                                                <option value='9'>9</option><option value='10'>10</option>
                                                <option value='11'>11</option><option value='12'>12</option>
                                                <option value='13'>13</option><option value='14'>14</option>
                                                <option value='15'>15</option><option value='16'>16</option>
                                                <option value='17'>17</option><option value='18'>18</option>
                                                <option value='19'>19</option><option value='20'>20</option>
                                                <option value='21'>21</option><option value='22>22</option>
                                                <option value='23'>23</option><option value='24'>24</option>
                                                <option value='25'>25</option><option value='26'>26</option>
                                                <option value='27'>27</option><option value='28'>28</option>
                                                <option value='29'>29</option><option value='30'>30</option>
                                                <option value='31'>31</option>
									</select>
				  <font><b>Month</b></font>
						<select name='month'>
                            <option value='UNKNOWN'>select...</option>
                            <option value='1'>1</option><option value='2'>2</option>
                            <option value='3'>3</option><option value='4'>4</option>
                            <option value='5'>5</option><option value='6'>6</option>
                            <option value='7'>7</option><option value='8'>8</option>
                            <option value='9'>9</option><option value='10'>10</option>
                            <option value='11'>11</option><option value='12'>12</option>
						</select>
						<b>Year</b><input type='text' name='year' size='6'></td></tr>
		
		<tr><td><font face='astonished' size='6.5'>Upload: </font></td><td><input type='file' name='pdf'/></td></tr>
		</table>
		
		<center><input type='submit' value='Submit'></center>
		</form>
		<hr/>";
		
		//Filters
		echo "<form action='upload.php' method='POST'>
				  <table width=100%><tr>
				<td><font face='astonished' size='6.5'>Semester:</font> <select name='fsemester'>
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
				
				$sql="select * from assignment where sem=$fsemester";
				$query=mysql_query($sql);
			}
			
			if($fsemester=='UNKNOWN')
			{
				
				$sql="select * from assignment where course='$fcourse'";
				$query=mysql_query($sql);
			}
			
			echo "<table width=100% cellpadding='3'>
				<tr class='head'><tr><td><font face='Brandon Grotesque Bold'>Sr. No.</font></td>
									 <td><font face='Brandon Grotesque Bold'>Course</font></td>
									 <td><font face='Brandon Grotesque Bold'>Semester</font></td>
									 <td><font face='Brandon Grotesque Bold'>Topic</font></td>
									 <td><font face='Brandon Grotesque Bold'>Deadline</font></td>
									 <td><font face='Brandon Grotesque Bold'>Path</font></td>
								</tr>";
								
				$row_style="style1";
				echo"$query";
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
			$sql="select * from assignment";
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
					<td>$row_data[0]</td><td>$row_data[1]</td><td>$row_data[2]</td><td>$row_data[3]</td><td><a href='$row_data[4]'>$row_data[4]</a></td><td>$row_data[5]</td>
					</tr>";
					
				}
				echo "</table><br/><br/><br/><br/>";
		}
	}
		
	else
	{
		echo "Connection Error";
	}
echo "</div>";
include('right.php');
include('foot.php');
?>