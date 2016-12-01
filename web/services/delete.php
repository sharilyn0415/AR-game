<?php
	include('../header.php');
	if (isset($_POST['id'])) {
		$stmt = $conn->prepare("DELETE FROM locations WHERE id = ?");
		$stmt->bind_param("i", $_POST['id']);

		if ($stmt->execute() == TRUE) {
		    echo "This record has been deleted!";
		    header( 'Location: ../admin.php' );
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	include('../footer.php');
?>