<?php
error_reporting(0);
include 'inc/dbcon.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if rowId is set and not empty
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $rowId = $_POST['id'];
        // Prepare the SQL query to avoid SQL injection
        $stmt = $db->prepare("UPDATE `totalexperience` SET `DeletedStatus` = '1' WHERE `ID` = ?");
        $stmt->bind_param("i", $rowId);
        // Execute the query
        if ($stmt->execute()) {
            $response = ['status' => 'success', 'message' => 'Row processed successfully'];
        } else {
            $response = ['status' => 'error', 'message' => 'Database update failed'];
        }
        // Close the statement
        $stmt->close();
    } else {
        $response = ['status' => 'error', 'message' => 'Invalid ID'];
    }
    // Close the database connection
    $db->close();
    // Return a response
    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
