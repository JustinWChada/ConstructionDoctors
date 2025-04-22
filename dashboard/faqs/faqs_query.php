<?php
require "../db_management.php";

// --- DELETE FAQ ---
// function deleteFaq($MgtConn)
// {

if (isset($_GET['delete_faq']) && is_numeric($_GET['delete_faq'])) {
    $faq_id = intval($_GET['delete_faq']);
    //$d_id = PDO::PARAM_INT;

    try {
        $sql = "DELETE FROM faqs WHERE faq_id = ?";
        $stmt = $MgtConn->prepare($sql);
        $stmt->bind_param('i', $faq_id);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>FAQ deleted successfully.</p>";
            // Optionally redirect to refresh the FAQ list.
            header("Location: " . $_SERVER['HTTP_REFERER']); // $_SERVER['PHP_SELF']
            exit();

        } else {
            echo "<p style='color:red;'>Error deleting FAQ: " . $stmt->error . "</p>";
        }

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Connection error: " . $e->getMessage() . "</p>";
    }
}
//}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_faq'])) {
    $question = isset($_POST['faq_question']) ? trim($_POST['faq_question']) : '';
    $answer = isset($_POST['faq_answer']) ? trim($_POST['faq_answer']) : '';

    if (empty($question) || empty($answer)) {
        echo "<p style='color:red;' class='text-center fw-bold'>Question and Answer are required.</p>";
    } else {

        try {
            $sql = "INSERT INTO faqs (question, answer, created_at) VALUES (?, ?,NOW())";
            $stmt = $MgtConn->prepare($sql);
            $stmt->bind_param('ss', $question, $answer);
            ;

            if ($stmt->execute()) {
                echo "<p style='color:green;' class='text-center fw-bold'>FAQ added successfully.</p>";
                //Generate a new token AFTER successful submission
                //$_SESSION['form_token'] = generateFormToken(); // VERY IMPORTANT: New token on success

                // Redirect to prevent accidental resubmission on refresh
                header("Location: " . $_SERVER['PHP_SELF']);
                exit(); // Exit after redirect

            } else {
                echo "<p style='color:red;' class='text-center fw-bold'>Error adding FAQ: " . $stmt->error . "</p>";
            }

        } catch (PDOException $e) {
            echo "<p style='color:red;' class='text-center fw-bold'>Connection error: " . $e->getMessage() . "</p>";
        }
    }
}