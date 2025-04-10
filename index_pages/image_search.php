<?php
// Include Google Cloud Vision Client library
require 'vendor/autoload.php';

use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Likelihood;

header('Content-Type: application/json');

// Your Google Vision API Key (downloaded JSON)
putenv('GOOGLE_APPLICATION_CREDENTIALS=protean-chassis-453100-t8-612d1545e857.json');

// Check if an image is uploaded
if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $imagePath = $image['tmp_name'];

    try {
        // Instantiate ImageAnnotatorClient
        $imageAnnotator = new ImageAnnotatorClient();

        // Read image into a string
        $imageData = file_get_contents($imagePath);

        // Send the image to the API
        $response = $imageAnnotator->labelDetection($imageData);
        $labels = $response->getLabelAnnotations();

        // Get the labels for the image
        $labelsArray = [];
        foreach ($labels as $label) {
            $labelsArray[] = $label->getDescription();
        }

        // Now search for matching products in your database based on labels
        $conn = new mysqli('localhost', 'username', 'password', 'your_database_name');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $labelString = implode(' ', $labelsArray); // Join all labels into a string

        // Query to search products based on image labels (you can improve the query as needed)
        $query = "SELECT * FROM products WHERE product_title LIKE '%$labelString%' OR product_description LIKE '%$labelString%'";
        $result = $conn->query($query);

        // Check if products are found
        if ($result->num_rows > 0) {
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = [
                    'product_title' => $row['product_title'],
                    'product_image' => $row['product_image'], // Assuming there's an image column
                ];
            }

            // Return success with product results
            echo json_encode(['status' => 'success', 'products' => $products]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No products found']);
        }

        // Close connection
        $conn->close();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to process the image']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No image uploaded']);
}
?>
