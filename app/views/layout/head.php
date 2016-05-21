<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?=$data['title']?></title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
    <style type="text/css">
		body{
			font-family: 'Open Sans','Lato', Helvetica, sans-serif;
			color:#222;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
		.english{
			font-family: 'Open Sans','Lato', Helvetica, sans-serif;
		}
    </style>

	</head>
	<body class='container'>

<br><br>

	<?php include_once('messages.php') ?>

<hr>

<a href="<?=Base_URL?>csv/index" class='btn btn-default col-sm-6'>View All</a>
<a href="<?=Base_URL?>csv/json" class='btn btn-default col-sm-6'>View JSON</a>

<hr>
<br>
