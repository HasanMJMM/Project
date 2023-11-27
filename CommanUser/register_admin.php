<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uname = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $phone_no = $_POST["pno"];
    $role = "admin";

    // Your database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db1";

    // Variables for user data


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the last user ID from the database
    $sqlLastUserID = "SELECT User_ID FROM user ORDER BY User_ID DESC LIMIT 1";
    $result = $conn->query($sqlLastUserID);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastUserID = $row["User_ID"];

        // Extract the numeric part of the last user ID and increment it for the next ID
        $numericPart = (int)substr($lastUserID, 4); // Assuming 'USER' is the prefix
        $nextUserID = 'USER' . sprintf('%04d', $numericPart + 1);
    } else {
        // If no previous users exist, start with USER0001
        $nextUserID = 'USER' . sprintf('%04d', 1);
    }

    // Prepare and execute the SQL statement to insert a new user
    $sql = "INSERT INTO user (User_ID, Name, Email, Username, Password, Phone_Number, role) VALUES ('$nextUserID', '$name', '$email', '$uname', '$pwd', '$phone_no', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to sign_in.php with success message
        header("Location: ./sign_in.php?success=none");
        exit();
    } else {
        // Redirect to sign_in.php with error message
        header("Location: ../sign_in.php?error=" . urlencode($conn->error));
        exit();
    }

    // Close connection
    $conn->close();
}
