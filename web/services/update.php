<?php
	include('../header.php');
	if (isset($_POST['longitude']) && isset($_POST['latitude']) && isset($_POST['url']) && isset($_POST['type']) && isset($_POST['id'])) {
		$stmt = $conn->prepare("UPDATE locations SET longitude = ?, latitude = ?, url = ?, type=? WHERE id = ?");
		$stmt->bind_param("ssssi", $_POST['longitude'], $_POST['latitude'], $_POST['url'],$_POST['type'], $_POST['id']);

		if ($stmt->execute() == TRUE) {
		    header( 'Location: ../admin.php#database' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} 

	include('../footer.php');
?>