<?php
require "db_management.php";
require "db_users.php";

function getTotalCounts($table, $sql_today)
{


    require "db_management.php";
    // Check if the connection is valid
    if (!$MgtConn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the total number of enquiries
    $sql_total = "SELECT COUNT(*) AS total FROM $table";
    $result_total = mysqli_query($MgtConn, $sql_total);

    if ($result_total) {
        $row_total = mysqli_fetch_assoc($result_total);
        $total_data = $row_total['total'];
    } else {
        $total_data = "Err !"; // Handle the error appropriately
    }

    // Get the number of new enquiries today
    $result_today = mysqli_query($MgtConn, $sql_today);

    if ($result_today) {
        $row_today = mysqli_fetch_assoc($result_today);
        $new_data_today = $row_today['today'];
    } else {
        $new_data_today = "Err !"; // Handle the error appropriately
    }

    $output = array($total_data, $new_data_today);

    // Close the database connection (Important!)
    mysqli_close($MgtConn);  // Consider when to close, based on when you are done with the connection.

    return $output;
}
?>

<div class="dashboard-content">
    <div class="dashboard-header">
        <h1 id="dashboard">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Contact Messages -->
        <?php
        $sql = "SELECT COUNT(*) AS today FROM contact_messages WHERE DATE(created_at) = CURDATE()";
        $contact_messages = getTotalCounts("contact_messages", $sql);
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-question-circle-fill"></i>
                    Contact Us
                </div>
                <div class="card-body">
                    <p class="card-text placeholder-data">Total Messages:
                        <strong><?php echo $contact_messages[0]; ?></strong>
                    </p>
                    <p class="card-text placeholder-data">New Messages:
                        <strong><?php echo $contact_messages[1]; ?></strong>
                    </p>
                    <a href="?messages" class="btn btn-outline-warning">View All Messages</a>
                </div>
            </div>
        </div>

        <!-- Quotes Card -->
        <?php
        $sql = "SELECT COUNT(*) AS today FROM quotes WHERE quote_status = 0";
        $quotes = getTotalCounts("quotes", $sql);
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-cash-coin"></i>
                    Quotes
                </div>
                <div class="card-body">
                    <p class="card-text placeholder-data">Total Quotes:
                        <strong><?php echo $quotes[0] ?></strong>
                    </p>
                    <p class="card-text placeholder-data">Pending Quotes:
                        <strong><?php echo $quotes[0] ?></strong>
                    </p>
                    <a href="?quotes" class="btn btn-outline-warning">View All Quotes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Projects Card -->
        <?php
        $sql = "SELECT COUNT(*) AS today FROM projects WHERE YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)"; // on here i am just using today var instead of the actual var this_week to avoid the error that will occure on line 29 of this file
        $projects = getTotalCounts("projects", $sql);
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-calendar-check-fill"></i>
                    Projects
                </div>
                <div class="card-body">
                    <p class="card-text placeholder-data">Total Projects: <strong><?php echo $projects[0] ?></strong>
                    </p>
                    <p class="card-text placeholder-data">Total Week Projects:
                        <strong><?php echo $projects[1] ?></strong>
                    </p>
                    <a href="?projects" class="btn btn-outline-primary">View All Projects</a>
                </div>
            </div>
        </div>

        <!-- Testimonials Card -->
        <?php
        $sql = "SELECT COUNT(*) AS today FROM testimonials WHERE YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)";// on here, same comment applies as on comment on line 100
        $testimonials = getTotalCounts("testimonials", $sql);
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-envelope-fill"></i>
                    Testimonials
                </div>
                <div class="card-body">
                    <p class="card-text placeholder-data">Total Testimonials:
                        <strong><?php echo $testimonials[0]; ?></strong>
                    </p>
                    <p class="card-text placeholder-data">New Testimonials:
                        <strong><?php echo $testimonials[1]; ?></strong>
                    </p>
                    <a href="?testimonials" class="btn btn-outline-primary">View All Testimonials</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Contact Messages -->
    <div class="card">
        <div class="card-header">
            Recent Contact Us
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php

                // Assuming $MgtConn is a valid database connection
                
                // Check if the connection is established
                if (!$MgtConn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // SQL query to retrieve data from the contact_messages table.  Retrieve all columns for this example.  Adjust as needed.
                $sql = "SELECT id, name, contact_email, contact_phone_number, contact_subject, contact_message, created_at FROM contact_messages ORDER BY created_at DESC LIMIT 5";

                $result = mysqli_query($MgtConn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Query failed: " . mysqli_error($MgtConn));
                }

                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // Loop through the results and display them in the table
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["contact_email"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["contact_phone_number"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["contact_subject"]) . "</td>";
                                echo "<td>" . htmlspecialchars(substr($row["contact_message"], 0, 50)) . (strlen($row["contact_message"]) > 50 ? "..." : "") . "</td>"; // Truncate message for display
                                echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No contact messages found.</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>


                <?php
                // Close the database connection
                mysqli_close($MgtConn);
                ?>
            </div>
        </div>
    </div>

    <!-- Recent User Table -->
    <div class="card">
        <div class="card-header">
            Users in The System
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php

                // Assuming $UsersConn is a valid database connection
                
                // Check if the connection is established
                if (!$UsersConn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // SQL query to retrieve data from the users table.  Retrieve all columns for this example.  Adjust as needed.
                $sql = "SELECT user_id, first_name, email, created_at FROM users";  // Added user_id and created_at
                
                $result = mysqli_query($UsersConn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Query failed: " . mysqli_error($UsersConn));
                }

                ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        // Loop through the results and display them in the table
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["user_id"]) . "</td>";  //escape output
                                echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>"; //escape output
                                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";  //escape output
                                echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";  //escape output
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No users found.</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>

                <?php
                // Close the database connection
                mysqli_close($UsersConn);
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="js/statistics.js"></script>