<?php
error_reporting(E_ALL & ~E_NOTICE);
ob_start();

include('style.php');
include('head.php');
include('left.php');
echo "<div class='main'>";

echo "<br/><br/><center><h1><font face='28 Days Later' color='cyan' size='8'>Student List</font></h1></center>";
$connection_status=include("connect.php");    

if($connection_status)
{
		//Query according to filtered or unfiltered request
		if(isset($_POST['name']) || isset($_POST['father']) || isset($_POST['year']) || isset($_POST['gender']) || isset($_POST['courses']))
		{
			$name=$_POST['name'];
			$father=$_POST['father'];
			
			$day=$_POST['day'];
			$month=$_POST['month'];
			$year=$_POST['year'];
			$birth=$day.'/'.$month.'/'.$year;
			if(isset($_POST['gender']))
			{
			$gender=$_POST['gender'];
			}
			$courses=$_POST['courses'];
			$sql1="";
			
			
			if($name!="")
			{
				$sql1.="Name='$name'";
			}
			
			if($father!="")
			{
				if($sql1!="")
				{$sql1.=" && ";}
				$sql1.="Father='$father'";
			}
			
			if($year!="")
			{
				if($sql1!="")
				{$sql1.=" && ";}
				$sql1.="Birth='$birth'";
			}
			if(isset($_POST['gender']))
			{
			if($gender!="")
			{
				if($sql1!="")
				{$sql1.=" && ";}
				$sql1.="Gender='$gender'";
			}
			}
			if($courses!='UNKNOWN')
			{
				if($sql1!="")
				{$sql1.=" && ";}
				$sql1.="Courses='$courses'";
			}
			
			$sql1="select * from info where ".$sql1;
			//echo "$sql1";
			//$sql1="select * from info where Name='$name' && f_name='$father' && dob='$birth' && Gender='$gender' && course_avail='$courses'";
			$query1=mysql_query($sql1);
		}
		
		else
		{
			$sql1="select * from info";
			$query1=mysql_query($sql1);
		}
		
		    //Filters
			echo "<form action='viewall.php' method='POST'>
				  <font face='astonished' size='5'>NAME:</font><input type='text' name='name'/><br/><br/>
				  <font face='astonished' size='5'>FATHER'S NAME:</font><input type='text' name='father'/><br/><br/>
				  
				  <font face='astonished' size='5'>DATE OF BIRTH:</font> 
				  <b>Day</b> <select name='day'>
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
                                                <option value='31'>31</option></select>
				  <b>Month</b>
						<select name='month'>
                            <option value='UNKNOWN'>select...</option>
                            <option value='1'>1</option><option value='2'>2</option>
                            <option value='3'>3</option><option value='4'>4</option>
                            <option value='5'>5</option><option value='6'>6</option>
                            <option value='7'>7</option><option value='8'>8</option>
                            <option value='9'>9</option><option value='10'>10</option>
                            <option value='11'>11</option><option value='12'>12</option>
						</select>
            <b>Year</b><input type='text' name='year' size='6'><br/><br/> 
			
			<font face='astonished' size='5'>GENDER:</font>
                <input type='radio' name='gender' value='male'><b>Male</b>
                <input type='radio' name='gender' value='female'><b>Female</b><br/><br/>
				
				<font face='astonished' size='5'>COURSE AVAILED:</font> 
				<select name='courses'>
                        <option value='UNKNOWN'>select...</option>
                        <option value='C'>C</option>
                        <option value='C++'>C++</option>
                        <option value='JAVA'>JAVA</option>
                        <option value='PHP'>PHP</option>
				</select>
				
				<center>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
				</center>";
														//Paging start
			
		$limit=5;
		$total_num_of_rows=mysql_num_rows($query1);
		$total_page=$total_num_of_rows/$limit;

		if(isset($_REQUEST['pageno']))
		{
			$pageno=$_REQUEST['pageno'];
		}
		else
		{
			$pageno=0;
		}
		
		$offset=$pageno*$limit;
		$sql=$sql1." limit $offset,$limit";  //This statement means that starting from 'n=$offset' display 'n=$limit entries'
		
		$query=mysql_query($sql);
		$num_of_rows=mysql_num_rows($query);

		//echo " [num of rows found=$total_num_of_rows   total_page=$total_page]";

		echo "<hr/>";
		//Paging links
		if($pageno>0)     //Previous page link
		{
			$last_pageno=$pageno-1;
			echo "<a href='viewall.php?pageno=$last_pageno'><<</a>";
		}

		for($i=0,$j=1;$i<$total_page;$i++,$j++)  //Link by page number
		{
			echo "<a href='viewall.php?pageno=$i'>$j</a>  &nbsp; &nbsp;";
		}

		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		if($pageno<$total_page-1)   //Next page link
		{
			$pageno =$pageno+1;
			echo "<a href='viewall.php?pageno=$pageno'>>></a>";
		}
																//Paging end
			
			
			//View entries
			echo "<table width=100% cellpadding='3'>
			<tr class='head'><tr><td><font face='Brandon Grotesque Bold'>Student Name</font></td>
								<td><font face='Brandon Grotesque Bold'>Father's Name</font></td>
								<td><font face='Brandon Grotesque Bold'>Date of birth</font></td>
								<td><font face='Brandon Grotesque Bold'>Gender</font></td>
								<td><font face='Brandon Grotesque Bold'>Place of Residence</font></td>
								<td><font face='Brandon Grotesque Bold'>Course</font></td>
								<td><font face='Brandon Grotesque Bold'>Email-id</font></td>
								<td><font face='Brandon Grotesque Bold'>Contact Number</font></td>
							</tr>";
			$row_style="style1";
			
			while($row_data=mysql_fetch_array($query))
			{
				if($row_style=="style1"){$row_style="style2";}  
				else{$row_style="style1";}    
				
				echo 
				"<tr class='$row_style'>
				<td>$row_data[0]</td><td>$row_data[1]</td><td>$row_data[2]</td><td>$row_data[3]</td><td>$row_data[4]</td>
				<td>$row_data[5]</td><td>$row_data[6]</td><td>$row_data[7]</td>
				</tr>";
			}
			echo "</table>";
		
}
else
{
	echo "Connection Error!!!";
}
 
echo "</div>";
include('right.php');
include('foot.php');
?>