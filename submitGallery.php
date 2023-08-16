<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'pais';
$db_pass = 'zaL6i@h2X1$G';
$db_name = 'gground_db';

// Create database connection
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// If file upload form is submitted
$status = $statusMsg = '';
if (isset($_POST['image'])) {
    $imageDataUrl = $_POST['imageData'];

    // Extract base64-encoded image data
    $imageData = explode(',', $imageDataUrl)[1];

    // Decode base64 image data
    $decodedImageData = base64_decode($imageData);

    // Insert image content into database
    $insert = $db->query("INSERT into images (image, created) VALUES ('$decodedImageData', NOW())");

    if ($insert) {
        $status = 'success';
        $statusMsg = "File uploaded successfully.";
    } else {
        $statusMsg = "File upload failed, please try again.";
    }
}

// Display status message
echo $statusMsg;
?>