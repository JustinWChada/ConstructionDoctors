<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    <style>
        /* styles.css */

        #message {
            position: fixed;
            /* Positions the element relative to the viewport */
            top: 50%;
            /* Vertically centers the element */
            left: 50%;
            /* Horizontally centers the element */
            transform: translate(-50%, -50%);
            /* Adjusts for element's own dimensions */
            width: 80%;
            /* Adjust as needed, responsive width */
            max-width: 600px;
            /* Maximum width on larger screens */
            padding: 20px;
            background-color: #f8f8f8;
            /* Light background color */
            border: 1px solid #ddd;
            /* Subtle border */
            border-radius: 5px;
            /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            text-align: center;
            /* Center the text inside the div */
            z-index: 1000;
            /* Ensure it's on top of other content if needed */
        }

        #message h1 {
            font-size: 1.5em;
            /* Adjust as needed */
            color: #d32f2f;
            /* A shade of red for the header */
            margin-bottom: 15px;
            /* Space below the header */
        }

        #message h4 {
            font-size: 1em;
            /* Adjust as needed */
            color: #777;
            /* Gray color for the paragraph */
            margin-bottom: 10px;
            /* Space below the paragraph */
        }

        #message a {
            color: #1976d2;
            /* A shade of blue for the link */
            text-decoration: none;
            /* Remove underline */
            font-weight: bold;
            /* Make the link bold */
        }

        #message a:hover {
            text-decoration: underline;
            /* Add underline on hover for better UX */
        }

        /* Optional: Style the body to prevent content behind the message from being clickable */
        body {
            overflow: hidden;
            /*Disable scroll to the screen*/
        }
    </style>
</head>

<body>
    <div id="message">
        <h1>You have been logged out automatically because your session has expired</h1>
        <h4>You need to login again at <a href="signin">this page</a></h4>
    </div>

    <script>
        let messageElement = document.getElementById("message");

        let text = "<h1></h1>"
    </script>

</body>

</html>