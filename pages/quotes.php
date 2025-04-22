<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Stop execution if connection fails
}

// Function to store the email in the database
function storeQuoteEmail($conn, $email)
{
    // Validate the email address (basic check)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";  // Or throw an exception
    }

    try {
        $stmt = $conn->prepare("INSERT INTO quotes (email) VALUES (:email)");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return "Email submitted successfully!";
    } catch (PDOException $e) {
        error_log("Error storing email: " . $e->getMessage());
        return "An error occurred while submitting your email. Please try again later.";
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $message = storeQuoteEmail($conn, $email); // Store the email and get a status message
        echo "<div class='alert alert-info'>" . htmlspecialchars($message) . "</div>"; //Display alert message
    } else {
        echo "<div class='alert alert-danger'>Email field is required.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get a Quote</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Get a Quote</h1>
        <p>Enter your email address to receive a quote.</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>