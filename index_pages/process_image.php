<?php
// Read the raw POST data
$input = json_decode(file_get_contents('php://input'), true);

// Check if the image is set in the POST data
if (isset($input['image'])) {
    $base64Image = $input['image'];
    // Ensure the image data starts with 'data:image/jpeg;base64,' (or other valid image type)
    if (isset($input['image'])) {
        // Get the base64 string
        $base64Image = $input['image'];
    
        // Remove the "data:image/png;base64," part if it exists
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $matches)) {
            $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
        }
    
        // Decode the base64 string
        $imageData = base64_decode($base64Image);
    
        if ($imageData === false) {
            echo json_encode(['error' => 'Base64 decoding failed']);
            exit;
        }
    // Save the image to a file (optional)
    $fileName = 'uploaded_image.jpg'; // You can dynamically generate the filename
    file_put_contents($fileName, $imageData);

    // Here, you can now process the image with an API like Clarifai

    // Assuming you are using the Clarifai API:
    $clarifaiAPI = "https://clarifai.com/p87thww7ctef/my-first-application-pjupb"; // Replace with your API URL
    $apiKey = 'ed0fd4f929324d2db772a91b7238e1'; // Replace with your Clarifai API Key

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $clarifaiAPI);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json'
    ]);

    $payload = json_encode([
        'inputs' => [
            [
                'data' => [
                    'image' => [
                        'base64' =>$base64Image
                    ]
                ]
            ]
        ]
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    $response = curl_exec($ch);

    if(curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        // Return the Clarifai API response
        echo $response;
    }

    curl_close($ch);
}else{
    echo json_encode(['error'=>'Invalid image data format']);
}
} else {
    echo json_encode(['error' => 'No image data received']);
}
