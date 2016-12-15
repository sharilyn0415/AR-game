<?php
	include('../header.php');
	if (isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['url']) && isset($_POST['type'])) {
		$stmt = $conn->prepare("INSERT INTO locations (longitude, latitude, url, type) VALUES (?, ?, ?,?)");
		$stmt->bind_param("ssss", $_POST['longitude'], $_POST['latitude'], $_POST['url'], $_POST['type']);
		if ($stmt->execute() == TRUE) {
		    header( 'Location: ../admin.php#database' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	include('../footer.php');
?>