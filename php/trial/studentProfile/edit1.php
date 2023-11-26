<?php
ob_start();
include("mystyle.php");
echo "<div class='main'>";
echo "<center><h1>Edit</h1></center>";
$connection_status=include("db_connection.php");
if($connection_status)
{
			if(isset($_POST['student_id']))
			{
			$student_id=$_POST['student_id'];
			$name=$_POST['name'];
			$f_name=$_POST['f_name'];
			$m_name=$_POST['m_name'];
			$day=$_POST['day'];
            $month=$_POST['month'];		
            $year=$_POST['year'];
			$gender=$_POST['gender'];
			$email_id=$_POST['email_id'];
			$contact_no=$_POST['contact_no'];
			$pwd=$_POST['pwd'];
			$day2=$_POST['day2'];
            $month2=$_POST['month2'];		
            $year2=$_POST['year2'];
			$sql="update student set name='$name' ,f_name='$f_name',m_name='$m_name',dob='$day/$month/$year',gender='$gender',email_id='$email_id',contact_no='$contact_no',pwd='$pwd',date='$day2 $month2 $year2' where student_id=$student_id";
			$ten_uni=$_POST['ten_uni'];
			$ten_year=$_POST['ten_year'];
			$ten_percent=$_POST['ten_percent'];
			$t_uni=$_POST['t_uni'];
			$t_year=$_POST['t_year'];
			$t_percent=$_POST['t_percent'];
			$gra_uni=$_POST['gra_uni'];
			$gra_year=$_POST['gra_year'];
			$gra_percent=$_POST['gra_percent'];
			$post_uni=$_POST['post_uni'];
			$post_year=$_POST['post_year'];
			$post_percent=$_POST['post_percent'];
			$sql1="update qualification set ten_uni='$ten_uni' ,ten_year='$ten_year',ten_percent='$ten_percent',t_uni='$t_uni' ,t_year='$t_year',t_percent='$t_percent',gra_uni='$gra_uni' ,gra_year='$gra_year',gra_percent='$gra_percent',post_uni='$post_uni' ,post_year='$post_year',post_percent='$post_percent' where student_id=$student_id";
			if(mysql_query($sql))
			{
			echo "updated";
			header("Location:view.php?student_id=$student_id");
			}
			else
			{
			echo "error<br/>$sql";
			}
			if(mysql_query($sql1))
			{
			echo "updated";
			header("Location:view.php?student_id=$student_id");
			}
			else
			{
			echo "error<br/>$sql";
			}
			}
			else
			{
			
			$student_id=$_REQUEST['student_id'];
			$sql="select * from student where student_id=$student_id";
			$query_result=mysql_query($sql);
			$row=mysql_fetch_row($query_result);
			$name=$row[1];
			$f_name=$row[2];
			$m_name=$row[3];
			$date1=explode('/',$row[4]);
			$day=$date1[0];
            $month=$date1[1];			
            $year=$date1[2];		
			$gender=$row[5];
			$address=$row[6];
			$email_id=$row[7];
			$contact_no=$row[8];
			$pwd=$row[10];
			$date=explode(' ',$row[11]);
			$month2=$date[1];
			$day2=$date[0];
			$year2=$date[2];
			$sql2="select * from qualification where student_id=$student_id";
			$query=mysql_query($sql2);
			$row_data=mysql_fetch_row($query);
			$ten_uni=$row_data[1];
			$ten_year=$row_data[2];
			$ten_percent=$row_data[3];
			$t_uni=$row_data[4];
			$t_year=$row_data[5];
			$t_percent=$row_data[6];
			$gra_uni=$row_data[7];
			$gra_year=$row_data[8];
			$gra_percent=$row_data[9];
			$post_uni=$row_data[10];
			$post_year=$row_data[11];
			$post_percent=$row_data[12];
			echo "
<form action='edit1.php' method='post'>
<center>
<table width=50% >
<tr><td>Student ID</td><td><input type='hidden' name='student_id' value='$student_id'/>$student_id</td></tr>
<tr><td>Student Name</td><td><input type='text' id='txt1' name='name' placeholder='name' size='30' value='$row[1]'/></td></tr>
<tr><td></td><td><span class='err_msg' id='name_err'></span></td></tr>
<tr><td>Father's Name</td><td><input type='text' id='txt2' name='f_name' size='30' value='$row[2]'/></td></tr>
<tr><td></td><td><span class='err_msg' id='f_err'></span></td></tr>
<tr><td>Mother's Name</td><td><input type='text' id='txt3' name='m_name' size='30' value='$row[3]'/></td></tr>
<tr><td></td><td><span class='err_msg' id='m_err'></span></td></tr>
<tr><td>Date of Birth</td>
<td><select id='list1' name='day'>
<option value='$day'>$day</option>
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
<option value=8>8</option>
<option value=9>9</option>
<option value=10>10</option>
<option value=11>11</option>
<option value=12>12</option>
<option value=13>13</option>
<option value=14>14</option>
<option value=15>15</option>
<option value=16>16</option>
<option value=17>17</option>
<option value=18>18</option>
<option value=19>19</option>
<option value=20>20</option>
<option value=21>21</option>
<option value=22>22</option>
<option value=23>23</option>
<option value=24>24</option>
<option value=25>25</option>
<option value=26>26</option>
<option value=27>27</option>
<option value=28>28</option>
<option value=29>29</option>
<option value=30>30</option>
<option value=31>31</option>
</select>
<select id='list2' name='month'>
<option value='$month'>$month</option>
<option value=1>Jan</option>
<option value=2>Feb</option>
<option value=3>Mar</option>
<option value=4>Apr</option>
<option value=5>May</option>
<option value=6>Jun</option>
<option value=7>Jul</option>
<option value=8>Aug</option>
<option value=9>Sep</option>
<option value=10>Oct</option>
<option value=11>Nov</option>
<option value=12>Dec</option>
</select>
<select id='list3' name='year' >
<option value='$year'>$year</option>
<option value=1988>1988</option>
<option value=1989>1989</option>
<option value=1990>1990</option>
<option value=1991>1991</option>
<option value=1992>1992</option>
<option value=1993>1993</option>
<option value=1994>1994</option>
<option value=1995>1995</option>
<option value=1996>1996</option>
<option value=>1997</option> 
</select></td>
</tr>
<tr><td></td><td><span class='err_msg' id='dob_err'></span></td></tr>";
 if($gender==male||$gender==1)
{
echo "<tr><td>Gender</td><td><input type='radio' value='male' checked  name='gender' id='r1'/>Male<input type='radio' value='female' name='gender' id='r2'/>Female";
}
else
{
echo "<tr><td>Gender</td><td><input type='radio' value='male' name='gender' id='r1'/>Male<input type='radio' value='female' checked name='gender' id='r2'/>Female";
}
echo"
</td></tr>
<tr><td>Address</td><td><textarea id='textarea1' rows=3 cols=30 name='address'>$address</textarea></td></tr>
<tr><td></td><td><span class='err_msg' id='address_err'></span></td></tr>
<tr><td></td><td></td></tr>
<tr ><td colspan='2'>
<table border='1' width='30%'>
<tr><th>Qualification</th><th>Uni/college name</th><th>Year of appearing</th><th>Percentage</th></tr>
<tr><td>10th</td>
<td><input type='text' id='ten_uni' name='ten_uni' value='$ten_uni' size='30'/></td>
<td><input type='text' id='ten_year' name='ten_year'  value='$ten_year' size='10'/></td>
<td><input type='text' id='ten_percent' name='ten_percent'   value='$ten_percent' size='10'/></td></tr>
<tr><td>+2</td>
<td><input type='text' id='t_uni' name='t_uni'  value='$t_uni' size='30'/></td>
<td><input type='text' id='t_year' name='t_year' value='$t_year' size='10'/></td>
<td><input type='text' id='t_percent' name='t_percent'  value='$t_percent' size='10'/></td></tr>
<tr><td>Graduation</td>
<td><input type='text' id='gra_uni' name='gra_uni'  value='$gra_uni' size='30'/></td>
<td><input type='text' id='gra_year' name='gra_year'  value='$gra_year' size='10'/></td>
<td><input type='text' id='gra_percent' name='gra_percent'  value='$gra_percent' size='10'/></td></tr>
<tr><td>Post Graduation</td>
<td><input type='text' id='post_uni' name='post_uni'  value='$post_uni' size='30'/></td>
<td><input type='text' id='post_year' name='post_year'  value='$post_year' size='10'/></td>
<td><input type='text' id='post_percent' name='post_percent'  value='$post_percent' size='10'/></td></tr>
</table>
</td></tr>
<tr><td></td><td></td></tr>
<tr><td>Email Id</td><td><input type='text' id='txt4' name='email_id' value='$email_id' size='30'/></td></tr>
<tr><td></td><td><span class='err_msg' id='email_err'></span></td></tr>
<tr><td>Contact Number</td><td><input type='text' id='txt5' name='' size='1' value='+91' size='4'/>
<input type='text' id='txt6' name='contact_no' value='$contact_no' size='25''</td></tr>
<tr><td></td><td><span class='err_msg' id='contact_err'></span></td></tr>
<tr><td>Courses Available</td><td>
<input type='checkbox' id='chb1' value='1' name='plang[]'/>C<br/>
<input type='checkbox' id='chb2' value='2' name='plang[]'/>C++</br>
<input type='checkbox' id='chb3' value='3' name='plang[]'/>JAVA</br>
<input type='checkbox' id='chb4' value='4' name='plang[]'/>Advance JAVA</br>
<input type='checkbox' id='chb5' value='5' name='plang[]'/>PHP</br>
<input type='checkbox' id='chb6' value='6' name='plang[]'/>Database Administration</br>
<input type='checkbox' id='chb7' value='7' name='plang[]'/>ASP.net</br>
<input type='checkbox' id='chb8' value='8' name='plang[]'/>C#.net
</td></tr>
<tr><td></td><td><span class='err_msg' id='course_err'></span></td></tr>
<tr><td>
Create a password</td>
<td><input type='password' id='pwd1'  name='pwd' value='$pwd' size='30'/>
</td></tr>
<tr><td><span class='err_msg' id='pwd_err'></span></td></tr>
<tr><td>
Confirm your password</td>
<td><input type='password' id='pwd2' size='30' />
</td></tr>
<tr><td></td><td><span class='err_msg' id='pwd2_err'></span></td></tr>
<tr><td>Date of Submission</td><td>
<select id='list1' name='month2'>
<option value=$month2>$month2</option>
<option value=Jan>Jan</option>
<option value=Feb>Feb</option>
<option value=Mar>Mar</option>
<option value=Apr>Apr</option>
<option value=May>May</option>
<option value=Jun>Jun</option>
<option value=Jul>Jul</option>
<option value=Aug>Aug</option>
<option value=Sep>Sep</option>
<option value=Oct>Oct</option>
<option value=Nov>Nov</option>
<option value=Dec>Dec</option>
</select>
<input type='text'  id='day' name='day2' value='$day2' size='4' />
<input type='text' id='year' name='year2'value='$year2' size='10'/>
</td></tr>
<tr><td></td><td><span class='err_msg' id='date_err'></span></td></tr>
<tr><td colspan=2><center><input type='submit' value='update' class='btn'/>&nbsp &nbsp &nbsp <a href='edit.php?student_id=$student_id' value='update' class='btn'>reset </a></center></td></tr>
</table>
</center>
</form> ";
 }
		
}
else
{
echo "connection error";
}
 
echo "</div>";

?>