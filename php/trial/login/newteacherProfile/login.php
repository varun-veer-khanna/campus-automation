<?php
include('script.php');
echo "<div class='main'>
<center>
<table align='center'>
<tr><td>User Id</td><td><input type='text' placeholder='data' id='email' onkeyup='empty_check_1('email','email_err')' /></td><td><span class='err_msg' id='email_err'></span></td></tr>
<tr><td>password</td><td><input type='password' id='pwd' onkeyup='empty_check_1('pwd','password_err')'/></td><td>
<span class='err_msg' id='password_err'></span></td></tr>
<tr><td colspan=2><center><a href='index.php?student_id=1'/>
<input type='button' value='login'/>
</td></tr>
</table>
</center>
<table>";
?>