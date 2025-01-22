<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbbd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$query = "SELECT name, email, phone, blood_type, created_at FROM donors";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donors List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
            font-weight: bold;
            text-align: center;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        p {
            text-align: center;
            font-style: italic;
        }
        ::selection {
            background: #ffcc00; /* Background color for the selected text */
            color: #000000; /* Text color for the selected text */
        }
    </style>
</head>
<body>

<h1>Donors List</h1>

<?php
if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Email</th><th>Phone</th><th>Blood Type</th><th>Created At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["phone"]) . "</td>
                <td>" . htmlspecialchars($row["blood_type"]) . "</td>
                <td>" . htmlspecialchars($row["created_at"]) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No results found.</p>";
}

$conn->close();
?>

</body>
</html>
