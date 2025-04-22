<?php
require "../db_management.php";

$uploadDir = "../../files/uploads/projects/";
if (!file_exists($uploadDir)) {
    if (!mkdir($uploadDir, 0777, true)) {
        echo "Failed to create the upload directory: Contact Developer";
        exit;
    }
}

if (isset($_POST['save_project'])) {
    $project_title = $_POST['project_title'];
    $description = $_POST['description'];
    $created = date("Y-m-d H:i:s");
    $updated = date("Y-m-d H:i:s");

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];
        $filename = basename($_FILES["image"]["name"]); // Sanitize filename
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
        $filepath = $_FILES["image"]["tmp_name"];

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (!array_key_exists($ext, $allowed)) {
            echo "Error: Invalid file format.";
            exit;
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            echo "Error: File size is larger than 5MB.";
            exit;
        }

        /*if (!in_array($filetype, array_values($allowed))) { // Correct MIME check
            echo "Error: Invalid MIME type";
            exit;
        }*/

        $newFilename = uniqid() . "_" . $filename; // Unique filename to prevent overwrites
        $destination = $uploadDir . $newFilename;
        if (move_uploaded_file($filepath, $destination)) {
            $imagePath = $destination;
            // *** FIX: Check for prepare failure and report the error ***
            $stmt = $MgtConn->prepare("INSERT INTO projects (project_title,project_description,project_image,created_at,updated_at) VALUES (?, ?, ?, ?, ?)");
            if ($stmt === false) {
                echo "Prepare failed: " . htmlspecialchars($MgtConn->error);  // Echo the error! VERY IMPORTANT
                exit;
            }

            $stmt->bind_param('sssss', $project_title, $description, $newFilename, $created, $updated);

            if ($stmt->execute()) {
                echo "Project saved successfully!";
            } else {
                // *** FIX:  Report execution error ***
                echo "Failed to save project: " . htmlspecialchars($stmt->error);
            }

            // Close statement
            $stmt->close();


        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
            exit;
        }
    } else {
        echo "Error: No file was uploaded or there was an error during upload.";
        exit;
    }
}


// update_projects query
// Assuming $MgtConn is already established and available here

if (isset($_POST['update_id'])) {
    $id = $_POST['update_id'] ?? null;
    $project_title = $_POST['update_project_title'] ?? null;
    $project_description = $_POST['update_description'] ?? null;
    $updated = date("Y-m-d H:i:s");

    if ($id === null || $project_title === null || $project_description === null) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
        exit;
    }

    try {
        // Check if a new image was uploaded
        if (!empty($_FILES['update_image']['name'])) {
            $target_file = $uploadDir . basename($_FILES["update_image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Validate image (basic example)
            $check = getimagesize($_FILES["update_image"]["tmp_name"]);
            if ($check === false) {
                echo json_encode(['status' => 'error', 'message' => 'File is not an image.']);
                exit;
            }

            // Allow only certain file formats (example)
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo json_encode(['status' => 'error', 'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.']);
                exit;
            }

            $project_image = $_FILES["update_image"]["name"];

            //Move Uploaded file
            if (move_uploaded_file($_FILES["update_image"]["tmp_name"], $target_file)) {
                // Image upload successful, update the database with the new image path
                $sql = "UPDATE projects SET project_title = ?, project_description = ?, project_image = ?,updated_at = ? WHERE id = ?";
                $stmt = $MgtConn->prepare($sql);
                $stmt->bind_param('ssssi', $project_title, $project_description, $project_image, $updated, $id);

            } else {
                echo json_encode(['status' => 'error', 'message' => 'Sorry, there was an error uploading your file.']);
                exit;
            }

        } else {
            // No new image uploaded, update other fields only
            $sql = "UPDATE projects SET project_title = ?,project_description = ?,updated_at = ? WHERE id = ?";
            $stmt = $MgtConn->prepare($sql);
            $stmt->bind_param('sssi', $project_title, $project_description, $updated, $id);
        }

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Project updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update project.']);
        }

    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

?>