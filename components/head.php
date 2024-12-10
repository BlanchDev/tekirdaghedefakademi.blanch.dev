<?php 

date_default_timezone_set('Europe/Istanbul');
$bugun = date("H:i:s d.m.Y"); 
$ip = $_SERVER['REMOTE_ADDR'];
$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X53BV69KQH"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-X53BV69KQH');
</script>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=0.7">
<link rel="icon" type="webp" href="/resources/photos/icon.webp">

<link rel="stylesheet" type="text/css" href="/src/main.css?version=3">
<script src="/src/jquery361.js?version=3"></script>

<meta name="keywords" content="YÖS, KPSS, ALES, AÖF, DGS, LSG">
<meta name="author" content="Emir Yılmaz">