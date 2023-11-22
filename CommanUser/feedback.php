<?php
/*session_start();
require_once('../Classes/Pessenger.php');
require_once('../Classes/DbConnector.php');

use classes\Pessenger;
use Classes\DbConnector;

$dbcon = new DbConnector();
$con = $dbcon->getConnection();

// Check if the User_ID is set in the session

///if (isset($_SESSION['User_ID'])) {
$User_ID = $_SESSION["userid"];
$user = new Pessenger(null, null, null, null, null, null, null);

// Fetch user details
$result = $user->diplayPessengerDetails($User_ID);

// Check if the result is a valid object
if ($result !== false) {
    $name = $result->Name;
    $email = $result->Email;
    $uid = $result->Username;
    $pno = $result->Phone_Number;
    $pwd = $result->Password;

    if (isset($_POST['update'])) {
        // Process form data and update the profile
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $uid = trim($_POST['username']);
        $pno = trim($_POST['phone_no']);
        $pwd = trim($_POST['password']);

        if ($user->updateProfile($name, $email, $uid, $pno, $pwd, $User_ID)) {
            $success = 'Profile Updated Successfully';
        } else {
            $errors[] = "Failed to Update Profile";
        }
    }
} else {
    // Handle the case where user details couldn't be retrieved
    $errors[] = "Failed to Fetch User Details";
}
//} else {
// Handle the case where User_ID is not set in the session
// $errors[] = "User is not logged in. Please ensure the session is properly set.";
//}*/
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@100;300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <title>Profile</title>
</head>

<body>
    <!-- Log-Out-Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #f3c001; color:#000032;">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Log Out</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center align-items-center text-center">
                        <div class="row">
                            <img src="./Images/icons/log-out-svgrepo-com.svg" class="logout-icon">
                        </div>
                        <div class="row">
                            <h1>Are you sure you want to log Out ?</h1>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #000032; color:#f3c001;"
                        data-bs-dismiss="modal">No Keep me stay</button>
                    <a href="./logout.php"><button type="button" class="btn btn-danger">Yes Log out me.</button></a>
                </div>
            </div>
        </div>
    </div>
    <!--Nav bar start-->
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg NAVBAR">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./Images/Logo.png" alt="Logo" width="100" height="69"
                        class="d-inline-block align-text-top" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto d-flex align-items-center" style="--bs-scroll-height: 100px">
                        <li class="nav-item align-items-center">
                            <div class="d-flex align-items-center">
                                <p class="SubPageTitle FIRST-NAVLINK">
                                    Welcome
                                    <?php
                                    if (isset($_SESSION["name"])) {
                                        echo $_SESSION["name"];
                                    } else {
                                        echo 'user ';
                                    }
                                    ?>
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="./commanUser.php"><ion-icon name="arrow-back-circle-outline"
                                class="mt-3 NAVLINKSICON"><span>go back</span>></ion-icon></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!---Nav bar End-->

    <section style="margin-top: 6rem;">
        <div class="row">
            <div class="col-3">
                <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse sideinavbar-profile-page">
                    <div class="position-sticky">
                        <div class="list-group list-group-flush mt-4 side-navbar-for-find-routes">
                            <a class="list-group-item list-group-item-action side-navbar-item-profile-page"
                                href="./profile.php"><span>Profile</span></a>
                            <a class="mt-2 list-group-item list-group-item-action side-navbar-item-profile-page-active"
                                href="./feedback.php"><span>Feedback</span></a>
                            <a class="mt-2 list-group-item list-group-item-action side-navbar-item-profile-page-logout"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"><span>Log Out</span></a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-9">
                <div id="content">
                    <!--breadcum bar-->
                    <div class="row p-4 pb-0 pt-5 NAVBAR">
                        <div class="d-flex justify-content-center align-items-center text-center col pt-3">
                            <nav class="bread-card p-3 mb-4">
                                <ol class="breadcrumb mb-0 text-center">
                                    <li class="active">
                                        <h5 class="SubPageTitle-heading FIRST-NAVLINK">Send us Feedback</h5>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>


                    <!-- User Detail Update Card -->

                    <div class="card custom-card">
                        <div class="card-body">
                            <?php
                            //$User_ID=USER0005;
                            
                            /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST['submit'])) {

                                    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || empty($_POST['pno'])) {
                                        echo '<div class="alert alert-danger" role="alert">Please fill in all fields.</div>';
                                    } else {
                                        $name = $_POST['name'];
                                        $email = $_POST['email'];
                                        $message = $_POST['message'];
                                        $pno = $_POST['pno'];

                                        // Basic email validation
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            echo '<div class="alert alert-danger" role="alert">Please enter a valid email address.</div>';
                                        } else {
                                            $contact = new Pessenger(null, null, null, null, null, null, null, null, null);
                                            if ($contact->contactUs($name, $email, $message, $pno)) {
                                                echo '<div class="alert alert-primary" role="alert">
                            Thank you for reaching out! Your message has been submitted successfully. We appreciate your interest and will get back to you as soon as possible. Have a great day!!
                          </div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">Error!</div>';
                                            }
                                        }
                                    }
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Fill the form through the Submit Button.</div>';
                                }
                            }*/

                            ?>

 <?php

require_once('../Classes/Pessenger.php');
use classes\Pessenger;
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['feedback']) ){
            echo '<div class="alert alert-danger" role="alert">Please fill in all fields.</div>';
        }else{
            $email = $_POST['email'];
            $feedback=$_POST['feedback'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<div class="alert alert-danger" role="alert">Please enter a valid email address.</div>';
            } else {
                $pesseger=new Pessenger(null,null,null,null,null,null,null,null,null);
                                    if($pesseger->Feedback($email,$feedback)){
                                        echo '<div class="alert alert-success">Thank You!!,Your Feedback.</div>';
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">Email is not found in the database..</div>';
                                    }
                                }
                            }

    }else{
        echo '<div class="alert alert-danger" role="alert">Error!</div>';
    }
    

 }else {
    //echo '<div class="alert alert-danger" role="alert">Fill the form through the Submit Button.</div>';
}


?>






                            <!---profile card--->
                            <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email"
                                            placeholder="name@example.com" name="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="feedback" class="col-sm-2 col-form-label">Feedback Message</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="feedback" rows="6" placeholder="feedback"
                                            name="feedback" style="height: 150px;"></textarea>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <button type="submit" class="btn btn-primary update-button"
                                        name="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</body>

</html>