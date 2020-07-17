<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Slot machine game by Travis Luong">
	<meta name="keywords" content="slot machine, casino, html5, indie, browser-based, javascript, arcade, retro, oldschool, travis luong">
	<title>HTML5 Slot Machine</title>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
    <div id="header">
		<h1>HTML5 Slot Machine</h1>
		<a href="" class="btn-submit">Hola mundo</a>
		<button class="btn-submit"> hello</button>
        <p>By <a href="http://www.travisluong.com">Travis Luong</a></p>
    </div>
	<div id="stage">
	</div>
	<script src=" {{ asset('js/gamesInitialize.js') }}"></script>
	<script src=" {{ asset('js/application.js') }}"></script>
</body>
</html>
