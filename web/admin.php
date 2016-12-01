<?php
	include('header.php');
	include('footer.php');
?>
<html>
<head>
	<script>
		var loadData = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState == 4 && xhttp.status == 200) {
					if(xhttp.responseText == "") {
						return;
					}
					console.log(xhttp.responseText);
					var coordinates = JSON.parse(xhttp.responseText);
					if(coordinates.length == 0) {
						var res = "<th>There is No pre-set coordinates in DB!<th>";
					} else {
						var res = "<tr><th>ID</th><th>Longitude</th><th>Latitude</th><th>URL</th><th></th><th></th></tr>";
						for(var i = 0; i < coordinates.length; i++) {
							res += "<tr><td>"+coordinates[i].id+"</td><td>"+coordinates[i].longitude+"</td><td>"+coordinates[i].latitude+"</td><td>"+coordinates[i].url+"</td><td><a class='btn btn-primary btn-xs' href='edit.php?id="+coordinates[i].id+"'>Edit</a></td><td><form method='POST' action='services/delete.php'><input type='hidden' name='id' value="+coordinates[i].id+" /><input class='btn btn-primary btn-xs' type='submit' value='Delete' /></form></td></tr>";
						}
					}
					document.getElementById("data").innerHTML = res;
			    }
			};
			xhttp.open("GET", "services/admin.php", true);
			xhttp.send();
		}
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body onload="loadData()">
		<div id="body">
			<h1>Admin System <a class='btn btn-primary btn-xs' href='add.html'>Add coordinates</a></h1>
			<table id="data" class="table table-hover"></table >
		</div>
</body>
</html>

