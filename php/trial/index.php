<?php
//echo file_get_contents('http://www.holidaysavers.ca/europe-canada.php?detour');
/*echo file_get_contents('http://localhost/php/trial/stylesheet_php/stylesheet.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/headerMain.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/hmenu.php');

*/
include('stylesheet.php');
 include('headerMain.php');
 include('hmenu.php');

 
 echo "<link rel='stylesheet' type='text/css' href='menu.css' />";
echo "<script type='text/javascript' src='menu.js'></script>";
echo "<div class=main>";//pre tag
/*echo "<html><head><head><body><marquee width=100% height=30 ><font color='red' >asdbas asdfkjasdkj  sakdjfasd  sdkjfasd asdf as  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
asdbas asdfkjasdkj  sakdjfasd  sdkjfasd asdf &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           
asdbas asdfkjasdkj  sakdjfasd  sdkjfasd asdf &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
asdbas asdfkjasdkj  sakdjfasd  sdkjfasd asdf as&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;               
asdbas asdfkjasdkj  sakdjfasd  sdkjfasd asdf as</font> </marquee></body></html>";
*/
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
<br/>
<br/>
<br/>
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

echo " <div class=submain2>";
echo "</h1><center><b>NOTICE BOARD</b></center></h1><br/><br/> ";
echo"<marquee direction=up><ul>
<li>&nbsp;&nbsp;œ TECH FEST</li> <br/>
<li>&nbsp;&nbsp;œ FOOTBALL MATCH</li> <br/>
<li>&nbsp;&nbsp;œ HERITAGE CLUB</li><br/>
<li>&nbsp;&nbsp;œ CRICKET MATCH</li><br/>
</ul></marquee>";
echo "</div>";
echo "<div class=submain3>";
echo"<h1><b><center>The Providence</center></b></h1><center></p>Providence college Mumbai was set up in 2007. The Institute is fast evolving as a seat of higher learning in the sphere of Emerging Technologies.<p>
The Institute has a mandate to focus on intensive study, research and training in areas of science engineereing and technology.  </center>";
echo "</div>";
echo "<div class=submain4>
  <p> In order to prepare the young men and women to be 'Global Professionals', the institute is simultaneously focusing on 'Emerging Technologies' including Biotechnology, Nano-technology, Information technology. Nearly 10,000 graduate and 3000 Post Graduate Engineers have passed out from this college during the last 50 years and are at present successfully employed in India & abroad.The college is now ISO 9001-2008 Certified, NBA accredited and have signed MoU with IOWA University [USA] for exchange of students and faculty
</p></div>";
echo "</div>";
echo "<div class=main2>";
echo "<div class=submain12> </div>";
echo "</div>";
/*echo file_get_contents('http://localhost/php/trial/stylesheet_php/footer.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/footer2.php');
echo file_get_contents('http://localhost/php/trial/stylesheet_php/left1.php');
//echo file_get_contents('http://localhost/php/trial/stylesheet_php/right.php');

 
*/include('footer.php');
include('left1.php');
include('right.php');
include('footer2.php');


?>