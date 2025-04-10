<?php
// Include database connection
include "../includes/connect.php"; // Replace with your actual database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the search term from the POST request
    $searchTerm = isset($_POST['searchTerm']) ? trim($_POST['searchTerm']) : '';

    if (!empty($searchTerm)) {
        // Prepare and execute the database query
        $stmt = $conn->prepare("INSERT INTO search_history (term) VALUES (?)");
        $stmt->bind_param("s", $searchTerm);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Search term logged successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to log search term."]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Search term is empty."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

// Close the database connection
$conn->close();
?>
