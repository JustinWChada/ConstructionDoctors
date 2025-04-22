<link rel="stylesheet" href="faqs/add_faqs.css" type="text/css">

<h1 class="faqs-section-title">Admin Side - FAQs</h1>

<form method="post" action="faqs/faqs_query.php" enctype="multipart/form-data">
    <label for="faq_question">Question:</label>
    <input type="text" id="faq_question" name="faq_question" required><br><br>

    <label for="faq_answer">Answer:</label>
    <textarea id="faq_answer" name="faq_answer" required></textarea><br><br>

    <button type="submit" name="add_faq">Add FAQ</button>
</form>

<?php

//some of the code below is commented out and duplicated in the faqs_query.php file: I left it here in case an errors arise. but as for future cases i will clean
//out the files. Or maybe i should do now 
require "../db_management.php";


// // Function to generate a unique token
// function generateFormToken()
// {
//     return bin2hex(random_bytes(32)); // Generate a 64-character hexadecimal string
// }

// // Function to check if the token is valid
// function isTokenValid($token)
// {
//     if (!isset($_SESSION['form_token'])) {
//         return false; // No token in session
//     }

//     return hash_equals($_SESSION['form_token'], $token); // Compare tokens safely
// }

// --- DELETE FAQ ---
// function deleteFaq($MgtConn)
// {

// if (isset($_GET['delete_faq']) && is_numeric($_GET['delete_faq'])) {
//     $faq_id = intval($_GET['delete_faq']);
//     //$d_id = PDO::PARAM_INT;

//     try {
//         $sql = "DELETE FROM faqs WHERE faq_id = ?";
//         $stmt = $MgtConn->prepare($sql);
//         $stmt->bind_param('i', $faq_id);

//         if ($stmt->execute()) {
//             echo "<p style='color:green;'>FAQ deleted successfully.</p>";
//             // Optionally redirect to refresh the FAQ list.
//             header("Location: " . $_SERVER['PHP_SELF']);
//             exit();

//         } else {
//             echo "<p style='color:red;'>Error deleting FAQ: " . $stmt->error . "</p>";
//         }

//     } catch (PDOException $e) {
//         echo "<p style='color:red;'>Connection error: " . $e->getMessage() . "</p>";
//     }
// }
//}

// --- ADD FAQ WITH INPUT FIELDS ---
// function addFaqForm($MgtConn)
// {

//     // // Start session at the top of the script
//     // if (session_status() === PHP_SESSION_NONE) {
//     //     session_start();
//     // }

//     // // Generate a new token if one doesn't exist
//     // if (!isset($_SESSION['form_token'])) {
//     //     $_SESSION['form_token'] = generateFormToken();
//     // }


//     // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_faq'])) {
//     //     $question = isset($_POST['faq_question']) ? trim($_POST['faq_question']) : '';
//     //     $answer = isset($_POST['faq_answer']) ? trim($_POST['faq_answer']) : '';

//     //     if (empty($question) || empty($answer)) {
//     //         echo "<p style='color:red;' class='text-center fw-bold'>Question and Answer are required.</p>";
//     //     } else {

//     //         try {
//     //             $sql = "INSERT INTO faqs (question, answer, created_at) VALUES (?, ?,NOW())";
//     //             $stmt = $MgtConn->prepare($sql);
//     //             $stmt->bind_param('ss', $question, $answer);
//     //             ;

//     //             if ($stmt->execute()) {
//     //                 echo "<p style='color:green;' class='text-center fw-bold'>FAQ added successfully.</p>";
//     //                 //Generate a new token AFTER successful submission
//     //                 //$_SESSION['form_token'] = generateFormToken(); // VERY IMPORTANT: New token on success

//     //                 // Redirect to prevent accidental resubmission on refresh
//     //                 header("Location: " . $_SERVER['PHP_SELF']);
//     //                 exit(); // Exit after redirect

//     //             } else {
//     //                 echo "<p style='color:red;' class='text-center fw-bold'>Error adding FAQ: " . $stmt->error . "</p>";
//     //             }

//     //         } catch (PDOException $e) {
//     //             echo "<p style='color:red;' class='text-center fw-bold'>Connection error: " . $e->getMessage() . "</p>";
//     //         }
//     //     }
//     // }
//     ?>




<?php
// }

// --- RETRIEVE FAQs ---
function getFaqs($MgtConn)
{
    require "../db_management.php";

    try {
        $sql = "SELECT faq_id, question, answer, created_at FROM faqs ORDER BY created_at DESC";
        $stmt = $MgtConn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); // Use get_result() for mysqli

        //$data = array();  Initialize an empty array

        echo "<table class='mt-3'>";
        echo "<thead><tr><th>FAQ ID</th><th>Question</th><th>Answer</th><th>Created At</th><th>Actions</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) { // Fetch all rows
            // $data[] = $row;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["faq_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["question"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["answer"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
            echo "<td><a href='faqs/faqs_query?delete_faq=" . htmlspecialchars($row["faq_id"]) . "&faqs'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        //$row_count = $result->num_rows; // Get the number of rows from the result

        //if ($row_count > 0) {

        // while ($row = $stmt->get_result()) {

        // }

        /*} else {
            echo "<p class='text-danger p-2 fw-2 text-center'>No FAQs found.</p>";
        }*/

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Connection error: " . $e->getMessage() . "</p>";
    }
}


// addFaqForm($MgtConn);
getFaqs($MgtConn);




// Example Usage (assuming $MgtConn is already defined and connected)
// Remember to include your database connection code before using these functions

//addFaqForm($MgtConn); // Display the Add FAQ form
//deleteFaq($MgtConn); // Handle delete FAQ request based on GET parameter
//getFaqs($MgtConn); // Display the FAQ list

?>