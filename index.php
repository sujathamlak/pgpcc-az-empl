<!DOCTYPE html>
<html>
<head>
	<title>MySQL Table Viewer</title>
</head>
<body>
	<h1>MySQL Table Viewer</h1>
	<?php
		// Define database connection variables
		$servername = "proj4-webapp-mysql-server.mysql.database.azure.com";
		$username = "user";
		$password = "P@ssw0rd";
		$dbname = "employees-db";

		// Create database connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query database for all rows in the table
		$sql = "SELECT * FROM departments";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// Display table headers
			echo "<table><tr><th>ID</th><th>Name</th></tr>";
			// Loop through results and display each row in the table
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["dept_no"] . "</td><td>" . $row["dept_name"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		// Close database connection
		$conn->close();
	?>
</body>
</html>
