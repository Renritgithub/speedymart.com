<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Recognition with Clarifai</title>
</head>
<body>
    <h2>Upload or Capture an Image</h2>

    <!-- Upload Image -->
    <input type="file" id="imageUpload" accept="image/*" onchange="uploadImage()" />

    <!-- Camera Input -->
    <button onclick="openCamera()">Open Camera</button>

    <!-- Image preview (optional) -->
    <img id="imagePreview" src="" alt="Image Preview" style="display: none;" width="300"/>

    <div id="loading" style="display: none;">Processing...</div>

    <script>
        const apiKey = 'YOUR_CLARIFAI_API_KEY'; // Replace with your Clarifai API Key

        // Function to upload image file
        function uploadImage() {
            const file = document.getElementById('imageUpload').files[0];
            if (file) {
                const reader = new FileReader();
                reader.onloadend = function () {
                    const base64Image = reader.result.split(',')[1]; // Extract base64 string
                    processImage(base64Image);
                };
                reader.readAsDataURL(file); // Read file as base64
            }
        }

        // Function to open the camera and capture an image
        function openCamera() {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    const video = document.createElement('video');
                    video.srcObject = stream;
                    video.play();

                    // Capture a photo
                    video.addEventListener('click', function() {
                        captureImage(video);
                        stream.getTracks().forEach(track => track.stop());
                    });
                })
                .catch(function (error) {
                    console.error("Camera error: ", error);
                });
        }

        // Capture image from camera
        function captureImage(video) {
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const imageData = canvas.toDataURL('image/jpeg').split(',')[1]; // Get base64 image data
            processImage(imageData);
        }

        // Process image with Clarifai API via AJAX
        function processImage(base64Image) {
            document.getElementById('loading').style.display = 'block'; // Show loading text

            const data = {
                'image': base64Image
            };
           console.log(base64Image);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'process_image.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    document.getElementById('loading').style.display = 'none'; // Hide loading text
                    console.log(response); // Handle the Clarifai API response here
                    alert('Image processed successfully');
                }
            };
            xhr.send(JSON.stringify(data));
        }
    </script>
</body>
</html>
