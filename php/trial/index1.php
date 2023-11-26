<?php
include('stylesheet.php');
include('headerMain.php');
include('hmenu.php');
echo "<link rel='stylesheet' type='text/css' href='menu.css' />";
echo "<script type='text/javascript' src='menu.js'></script>";
echo "<div class=main>";
echo "<div class=submain1>";

echo "
<html lang='en'>
<head>
	
	
	
	<link rel='stylesheet' href='css/global.css'>
	
	<script src='js/jquery.min.js'></script>
	<script src='js/slides.min.jquery.js'></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
</head>
<body>
	<div id='container'>
		<div id='example'>

			<div id='slides'>
				<div class='slides_container'>
					<div class='slide'>
						<img src='img/1.jpg' width='570' height='270' alt='Slide 1'></a><!--<div class='caption' style='bottom:0'><p>Happy Bokeh Thursday!</p>
						</div>--></div>
					<div class='slide'><img src='img/2.jpg' width='570' height='270' alt='Slide 2'></a>
						<!--<div class='caption'>p>Taxi</p>
						</div>--></div>
					<div class='slide'><img src='img/3.jpg' width='570' height='270' alt='Slide 3'></div>
					<div class='slide'><img src='img/4.jpg' width='570' height='270' alt='Slide 4'></div>
					<div class='slide'><img src='img/5.jpg' width='570' height='270' alt='Slide 5'></div>
					<div class='slide'><img src='img/6.jpg' width='570' height='270' alt='Slide 6'></div>
					<div class='slide'><img src='img/7.jpg' width='570' height='270' alt='Slide 7'></div>
		</div>
				<a href='#' class='prev'><img src='img/arrow-prev.png' width='24' height='43' alt='Arrow Prev'></a>
				<a href='#' class='next'><img src='img/arrow-next.png' width='24' height='43' alt='Arrow Next'></a>
			</div>
			<!--<img src='img/example-frame.png' width='739' height='341' alt='Example Frame' id='frame'>
		--></div>
		
	</div>
</body>
</html>
";


echo "</div>";

echo "<div class=submain2>";
echo "<font size='3' color='red'>This is some text!<h1>NOTICE BOARD</h1></font>";
echo "</div>";
echo "<div class=submain3></div>";
echo "<div class=submain4></div>";
echo "</div>";

include('left1.php');
include('right.php');
include('footer.php');
include('footer2.php');



?>