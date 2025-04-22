<?php
// Include database connection
require_once '../db_users.php';

// Initialize variables
$user_id = null;
$user_password = '';
$email = '';
$first_name = '';
$is_active = true;
$error = '';
$success = '';

session_start();

$userId = (int) $_SESSION['user_id'];

// Check if user ID is provided in the URL :: isset($_GET['id'])
if (!empty($userId) && is_numeric($userId)) {
    // Fetch user data
    $sql = "SELECT user_id, user_password, email, first_name, is_active FROM users WHERE user_id = ?";
    $stmt = $UsersConn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];
            $user_password = $row['user_password'];
            $email = $row['email'];
            $first_name = $row['first_name'];
            $is_active = (bool) $row['is_active'];
        } else {
            $error = "User not found.";
        }

        $stmt->close();
    } else {
        $error = "Error preparing statement: " . $UsersConn->error;
    }
}

?>
<link rel="stylesheet" href="profile/show_profile.css" type="text/css">

<h1 class="mt-1">Edit User Info</h1>

<?php if ($error): ?>
    <p style="color: red;" class="text-center fw-bold border"><?php echo $error; ?></p>
<?php endif; ?>

<?php if ($success): ?>
    <p style="color: green;" class="text-center fw-bold border"><?php echo $success; ?></p>
<?php endif; ?>
<div class="container">
    <form method="post" action="profile/show_profile_query.php" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">

        <label for="user_password">Password:</label>
        <input type="text" id="user_password_old" name="user_password_old"
            value="<?php echo htmlspecialchars($user_password); ?>" placeholder="Enter new password" hidden readonly>
        <input type="text" id="user_password" name="user_password" value="" placeholder="Enter new password">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">

        <label for="is_active">Active:</label>
        <input type="checkbox" id="is_active" name="is_active" <?php echo $is_active ? 'checked' : ''; ?>><br><br>

        <button type="submit" value="Update">Submit</button>
    </form>
</div>