<?php
error_reporting(E_ALL);
// Read the request body
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['task'])) {
    $task = trim($data['task']);

    // Establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the new task into the "tasks" table
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    $result = $conn->query($sql);

    $response = array();
    if ($result === TRUE) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    // Close the database connection
    $conn->close();

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
