<?php
error_reporting(E_ALL);
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve tasks from the "tasks" table
$sql = "SELECT id, task, created_at FROM tasks ORDER BY id DESC";
$result = $conn->query($sql);

$response = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $task = array(
            "id" => $row["id"],
            "task" => $row["task"],
            "created_at" => $row["created_at"]
        );
        $response[] = $task;
    }
}

// Close the database connection
$conn->close();

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
