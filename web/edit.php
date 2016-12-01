<?php
	include('header.php');
	if (isset($_GET['id'])) {
		$sql = "SELECT * FROM locations WHERE id = {$_GET['id']}";
		$result = $conn->query($sql);
		$res = $result->fetch_assoc();
	}
	include('footer.php');
?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<form class="form-group" action="services/update.php" method="POST">
		ID: <input class="form-control" type="text" name="id" value="<?php echo $res['id'] ?>" readonly />
		Longitude: <input class="form-control" type="text" name="longitude" value="<?php echo $res['longitude'] ?>" />
		Latitude: <input class="form-control" type="text" name="latitude" value="<?php echo $res['latitude'] ?>" />
		URL: <input class="form-control" type="text" name="url" value="<?php echo $res['url'] ?>" />
		<input class="btn btn-primary" type="submit" value="Submit">
	</form>
		
</body>
</html>