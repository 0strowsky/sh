$(document).ready(function(){
	var elementy = new Array(
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero1.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero2.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero3.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero4.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero5.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero6.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero7.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero8.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero9.png" style="height: 270px;">',
	'<IMG SRC="http://portal.holyshit.pl/images/header/hero10.png" style="height: 270px;">'
	);
	var liczba = 0;
	$('#navList li:first-child').css("border-left", "none");
	$('#menuList li:first-child').css("border-left", "none");
	$('#hero').html(elementy[0]).fadeIn("slow");
	setInterval(function herosy(){
	do { liczba = Math.random(); } while (liczba >= 1);
	liczba = Math.floor(liczba * elementy.length);
	return $('#hero').html(elementy[liczba]);
	}, 8000);
	
});
