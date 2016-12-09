<?php
	include('../header.php');
	if (isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['url']) && isset($_POST['id'])) {
		$stmt = $conn->prepare("UPDATE locations SET longitude = ?, latitude = ?, url = ? WHERE id = ?");
		$stmt->bind_param("sssi", $_POST['longitude'], $_POST['latitude'], $_POST['url'], $_POST['id']);

		if ($stmt->execute() == TRUE) {
		    header( 'Location: ../admin.php#database' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} 

	include('../footer.php');
?>