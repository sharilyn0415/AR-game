<?php
	include('../header.php');
	if (isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['url'])) {
		$stmt = $conn->prepare("INSERT INTO locations (longitude, latitude, url) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $_POST['longitude'], $_POST['latitude'], $_POST['url']);
		if ($stmt->execute() == TRUE) {
		    header( 'Location: ../admin.php#database' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	include('../footer.php');
?>