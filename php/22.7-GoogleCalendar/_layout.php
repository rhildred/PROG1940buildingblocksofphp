<!DOCTYPE html>
<html>
<head>
<title><?php echo $title ?></title>
</head>
<body>
<h1>Generic Header for <?php echo $title ?></h1>
<?php include(basename($_SERVER['PHP_SELF'])) ?>
</body>
</html>