<?php

echo "<div class=hmenu>";

echo "<html>
<head>
  <link type='text/css' href='menu.css' rel='stylesheet' />
   <script type='text/javascript' src='menu.js'></script>
</head>
<body>
<div id='menu'>
    <ul class='menu'>
	<li class=parent><span>&nbsp;</span></li>
	<a href=http://localhost/php/trial/><li>&nbsp;&nbsp;<img src=home_ico.png /></li></a>
        <li><a href='#' class='parent'><span>Academics</span></a>
            <ul>
                <li><a href='#' ><span>Examinations</span></a>
                              </li>
                <li><a href='#'><span>Results</span></a></li>
                <li><a href='#'><span>Syllabus</span></a></li>
            </ul>
        </li>
        <li><a href='#' class='parent'><span>Admissions</span></a>
            <ul>
                <li><a href='#' ><span>Admission Notice 2014-15</span></a></li>
                <li><a href='#' ><span>Eligibility Criteria</span></a></li>
                <li><a href='#'><span>Admission Instruction</span></a></li>
                <li><a href='#'><span>Prospectus</span></a></li>
                <li><a href='#'><span>Online admission</span></a></li>
                <li><a href='#'><span>Registration</span></a></li>
                <li><a href='#'><span>Fees Structure</span></a></li>
                
            </ul>
        </li>
		<li><a href='#' class='parent'><span>Faculty & Research</span></a>
			<ul>
				<li><a href=# class='parent'>Area of Expertise</a></li>
				<li><a href=# class='parent'>R&D jobs</a></li>
				<li><a href=# class='parent'>Faculty List</a></li>
			
			</ul>
			</li>
        <li><a href='#'><span>Students</span></a>
			<ul>
				<li><a href=# class='parent'>Dean-Student Affair</a></li>
				<li><a href=# class='parent'>Hostel</a></li>
				<li><a href=# class='parent'>Events 'n' Activities</a></li>
				<li><a href=# class='parent'>Organisations</a></li>
			</ul>
		</li>
		
		<li><a href='about.php' class='parent'><span>About Us</span></a>
        <li class='last'><a href='contact.php'><span>Contact</span></a></li>
    </ul>
</div>



</body>
</html>";

echo "</div>";




?>