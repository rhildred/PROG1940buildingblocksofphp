<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title ?></title>
<meta name="description"
	content="<?php if(isset($description)) echo $description; else echo 'TODO: description would go here'?>">
<meta name="keywords"
	content="<?php if(isset($keywords)) echo $keywords; else echo 'TODO: keywords should be here'?>">
<!-- Bootstrap core CSS -->
<link rel="stylesheet"
	href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet"
	href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
<!-- Custom styles for this template -->
<link href="main.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top <?php echo str_replace('.php', '', basename($_SERVER['PHP_SELF'])); ?>">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="."><?php echo $project; ?></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="calendar.php">Course Calendar</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>

	<div class="container">

		<div class="starter-template">
	<?php include(basename($_SERVER['PHP_SELF']))?>
        </div>

	</div>
	<!-- /.container -->
	<div class="navbar-inverse navbar-fixed-bottom">
	<p>&copy; Rich Hildred <?php if(date("Y") == "2013") echo date("Y"); else echo "2013-", date('Y'); ?>
	</p>
	</div>
</body>
<!-- JQuery -->
<script type="text/javascript" src="http://codeorigin.jquery.com/jquery-1.10.2.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script
	src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</html>