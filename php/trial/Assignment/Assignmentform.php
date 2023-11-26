<?php
ob_start();

include("mystyle.php");
include("head.php");
include("mainmenu.php");
include("leftmenu.php");

echo "<div class='main'>";

echo "<center><h1><font face='28 Days Later' color='dc143c' size='9'>New Assignment</font></h1></center>";
$con=include('connect.php');


if($con)
	{
		if(isset($_POST['name']))
			{
				$name=$_POST['name'];
				$semester=$_POST['semester'];
				$subject=$_POST['subject'];
				
				$day=$_POST['day'];
				$month=$_POST['month'];
				$year=$_POST['year'];
				$date=$day.'/'.$month.'/'.$year;
				
				$description=$_POST['description'];
				$insert_query="insert into empinfo(name, semester, subject, date, description) values('$name', $semester, '$subject', '$date', '$description')";
				
				if(!mysql_query($insert_query))
				{
					echo "Saving Error <br/>$insert_query";
				}
				
				//else
				{
					
				}
			}
		
		echo
		"<form action='Assignmentform.php' method='post' >
		<table><tr><td>Name: </td><td><input type='text' name='name'></td></tr>
		<tr><td>Semester: </td>
		<td>
			<select name='semester'>
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
		
		<tr><td>Subject: </td>
		<td>
			<select name='subject'>
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
		<tr><td>Submission Date: </td><td><font>Day</font> 
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
				  <font>Month</font>
						<select name='month'>
                            <option value='UNKNOWN'>select...</option>
                            <option value='1'>1</option><option value='2'>2</option>
                            <option value='3'>3</option><option value='4'>4</option>
                            <option value='5'>5</option><option value='6'>6</option>
                            <option value='7'>7</option><option value='8'>8</option>
                            <option value='9'>9</option><option value='10'>10</option>
                            <option value='11'>11</option><option value='12'>12</option>
						</select>
						<font>Year</font><input type='text' name='year' size='6'></td></tr>
		
		<tr><td>Description:</td>
		    <td><textarea rows=6 cols=35 name='description'></textarea></td>
		</tr>
		</table>
		
		<center><input type='submit' value='Submit'></center>
		</form>
		<hr/>";
		
		//List of Assignments
		$sql="select * from empinfo";
		$query=mysql_query($sql);
		echo "<table width=100% cellpadding='3'>
			<tr class='head'><tr><td><font face='Brandon Grotesque Bold'>Sr. No.</font></td>
								 <td><font face='Brandon Grotesque Bold'>Assignment Name</font></td>
								 <td><font face='Brandon Grotesque Bold'>Semester</font></td>
								 <td><font face='Brandon Grotesque Bold'>Subject</font></td>
								 <td><font face='Brandon Grotesque Bold'>Deadline</font></td>
								 <td><font face='Brandon Grotesque Bold'>Description</font></td>
							</tr>";
							
			$row_style="style1";
			$i=1;
			while($row_data=mysql_fetch_array($query))
			{
				if($row_style=="style1"){$row_style="style2";}  
				else{$row_style="style1";}    
				
				echo 
				"<tr class='$row_style'>
				<td>$i</td><td>$row_data[0]</td><td>$row_data[1]</td><td>$row_data[2]</td><td>$row_data[3]</td><td>$row_data[4]</td>
				</tr>";
				$i++;
			}
			echo "</table>";
	}
		
	else
	{
		echo "Connection Error";
	}
echo "</div>";

?>