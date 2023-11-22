<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $pno = $_POST["pno"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];


    // Check if passwords match
    if ($pwd !== $pwdRepeat) {
        header("Location: ../sign_in.php?error=passworddoesntmatch");
        exit();
    }

    // Hash the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $hashedPwdFromDB = "hashed_password_retrieved_from_database";
    // Compare the entered password with the stored hashed password
    $pwdMatch = password_verify($pwd, $hashedPwdFromDB);

    if (!$pwdMatch) {
        header("Location: ../sign_in.php?error=wronglogin");
        exit();
    }

    require_once 'DbConnector_n.php';
    require_once 'functions.php';

    $emptyInput = emptyInputSignup($name, $username, $email, $phone_no, $pwd, $pwdRepeat);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdRepeat);
    $uidExists = uidExists($conn, $username, $email);

    if ($emptyInput !== false) {
        header("Location: ../sign_in.php?error=emptyinput");
        exit();
    }
    if ($invalidUid !== false) {
        header("Location: ../sign_in.php?error=invaliduid");
        exit();
    }
    if ($invalidEmail !== false) {
        header("Location: ../sign_in.php?error=invalidEmail");
        exit();
    }
    if ($pwdMatch !== false) {
        header("Location: ../sign_in.php?error=passworddoesntmatch");
        exit();
    }
    if ($uidExists !== false) {
        header("Location: ../sign_in.php?error=usernameisalreadyexist");
        exit();
    }
    createUser($conn, $name, $email, $username, $pwd, $phone_no);

} else {
    header('Location:../sign_in.php');
    exit();
}