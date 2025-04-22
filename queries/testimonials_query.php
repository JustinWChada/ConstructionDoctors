<?php
require "db_management.php";
// Enable CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Upload directory
$uploadDir = "../files/uploads/testimonials/";
if (!file_exists($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
        echo "Failed to create the upload directory: Contact Developer";
        exit;
    }
}



try {
    // Get data from the request
    $name = isset($_POST['name']) ? $MgtConn->real_escape_string($_POST['name']) : '';
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment = isset($_POST['comment']) ? $MgtConn->real_escape_string($_POST['comment']) : '';
    $is_approved = 0;
    $created_at = date("Y-m-d H:i:s");

    // Validate data
    if (empty($name) || $rating < 1 || $rating > 5 || empty($comment)) {
        throw new Exception("Invalid input data. Please provide all required fields and a valid rating (1-5).");
    }

    // Handle image upload
    $imagePath = null; // Initialize to null

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imageName = uniqid() . "_" . $imageName; // Generate unique filename
        $targetFile = $uploadDir . $imageName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image
        $check = getimagesize($imageTmpName);
        if ($check === false) {
            throw new Exception("File is not an image.");
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }


        // Check file size (adjust as needed)
        if ($_FILES["image"]["size"] > 500000) {
            throw new Exception("Sorry, your file is too large.");
        }

        // Try to upload file
        if (move_uploaded_file($imageTmpName, $targetFile)) {
            $imagePath = $uploadDir . $imageName; // Store the relative path
        } else {
            throw new Exception("Sorry, there was an error uploading your file.");
        }
    }


    // Prepare and bind SQL statement
    $stmt = $MgtConn->prepare("INSERT INTO testimonials (name,rating,comment,image,created_at,is_approved) VALUES (?, ?, ?, ?, ? ,?)");
    if ($stmt === false) {
        throw new Exception("Prepare failed: " . $MgtConn->error);
    }
    $stmt->bind_param("sisssi", $name, $rating, $comment, $imageName, $created_at, $is_approved); // s=string, i=integer

    // Execute the statement
    if ($stmt->execute()) {
        $response = ['success' => true, 'message' => 'Testimonial submitted successfully!'];
        http_response_code(200);
    } else {
        throw new Exception("Execution failed: " . $stmt->error);
    }

    $stmt->close();
    $MgtConn->close();

} catch (Exception $e) {
    $response = ['success' => false, 'message' => $e->getMessage()];
    http_response_code(400);
}

echo json_encode($response);
exit;
?>