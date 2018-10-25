<?
	$selectedPage = 'home';
	
	if (!empty($_GET['page'])) {
		$selectedPage = $_GET['page'];
		if (!file_exists("{$selectedPage}.php")) {
			$selectedPage = '404';
		}
	} else {
		$selectedPage = 'home';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
	<?
    include 'menu.php';
    ?>
    <hr>
    <div>
		<?include "{$selectedPage}.php";?>
	</div>
</body>
</html>