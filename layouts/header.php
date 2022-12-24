<?php setcookie( 'last_page', $_SERVER['REQUEST_URI'], ( time() + 3600), '/' ); ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Mon site</title>
		
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dataTables.css" />
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	</head>

	<body>
	
		<div id="page">
