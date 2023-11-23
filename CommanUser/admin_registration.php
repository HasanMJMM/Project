<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/signnup.css">
    <title>signin-signup</title>
</head>

<body>




    <div class="container">
        <div class="row">

        </div>
        <div class="signin-signup">
            <form action="includes/login.inc.php" method="POST" class="sign-in-form">
                <?php
                if (isset($_GET["error"])) {

                    if ($_GET["error"] == "stmtfailed") {
                        echo 'stmtFailed';
                    }

                    if ($_GET["error"] == "wronglogin1") {
                        echo ' <div class="text-center">
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <img src="./Images/icons/wrong-delete-remove-trash-minus-cancel-close-svgrepo-com.svg" style="width: 100px; height: 100px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center">
                                    <p style="font-size: 25px; color:#000032;">Your User Account not registered</p>
                                </div>
                            </div>
                        </div>';
                    }
                    if ($_GET["error"] == "wronglogin2") {
                        echo ' <div class="text-center">
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <img src="./Images/icons/wrong-delete-remove-trash-minus-cancel-close-svgrepo-com.svg" style="width: 100px; height: 100px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center">
                                    <p style="font-size: 25px; color:#000032;">Your Pasword is Incorrect Pls Enter Correct Password</p>
                                </div>
                            </div>
                        </div>';
                    }
                    if ($_GET["error"] == "emptyinput") {
                        echo 'empty input';
                    }
                    if ($_GET["error"] == "invaliduid") {
                        echo 'invaild user ID';
                    }
                    if ($_GET["error"] == "invalidEmail") {
                        echo 'invaild Email Address';
                    }
                    if ($_GET["error"] == "passworddoesntmatch") {
                        echo 'Paswwords Does not match';
                    }
                    if ($_GET["error"] == "usernameisalreadyexist") {
                        echo 'User Name Already Exist';
                    }
                    if ($_GET["error"] == "none") {
                        echo 'Succes Fully Registered';
                    }
                }
                ?>
                <!-- <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="uid" placeholder="Email address">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="pwd" placeholder="Password">
                </div>
                <input type="submit" name="submit" value="Login" class="btn1">
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form> -->
            <form action="./register_user.php" method="POST" class="sign-up-form" id="signupForm">
                <h2 class="title">Admin Register</h2>
                <div class="text-center" id="alertDiv" style="font-size: 15px; color:red; font-weight:800;"></div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="First name">
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="uid" placeholder="Username" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="pno" placeholder="Phone Number" required>
                </div>

                <div class="row g-3">
                    <div class="col">
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="pwd" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="pwdrepeat" placeholder="Confirm Password" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" value="Register" class="btn1">
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
                <script>
                    // Get reference to the form and alert div
                    const form = document.getElementById('signupForm');
                    const alertDiv = document.getElementById('alertDiv');

                    // Function to display alert messages
                    function displayAlert(message) {
                        alertDiv.innerHTML = `<div class="alert">${message}</div>`;
                    }

                    // Function to validate email format
                    function validateEmail(email) {
                        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        return regex.test(email);
                    }

                    // Function to validate phone number length
                    function validatePhoneNumber(phone) {
                        return phone.length === 10 && !isNaN(phone);
                    }

                    // Function to handle form submission and validation
                    function handleSubmit(event) {
                        event.preventDefault(); // Prevent default form submission

                        // Get form field values
                        const email = form.email.value.trim();
                        const phone = form.pno.value.trim();
                        const password = form.pwd.value.trim();
                        const confirmPassword = form.pwdrepeat.value.trim();

                        // Validate email
                        if (!validateEmail(email)) {
                            displayAlert('Please enter a valid email address.');
                            return false; // Stop form submission if validation fails
                        }

                        // Validate phone number
                        if (!validatePhoneNumber(phone)) {
                            displayAlert('Please enter a 10-digit valid phone number.');
                            return false; // Stop form submission if validation fails
                        }

                        // Validate password and confirm password match
                        if (password !== confirmPassword) {
                            displayAlert('Passwords do not match.');
                            return false; // Stop form submission if validation fails
                        }

                        // If all validations pass, submit the form programmatically
                        // Perform AJAX request to send form data to the server
                        const formData = new FormData(form);
                        fetch('./register_user.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok.');
                                }
                                return response.text();
                            })
                            .then(data => {
                                // Handle successful form submission (if needed)
                                console.log('Form submitted successfully:', data);
                                // Redirect to a success page or perform other actions as needed
                                window.location.href = './sign_in.php?success=none';
                            })
                            .catch(error => {
                                // Handle errors
                                console.error('There was a problem with form submission:', error);
                                // Redirect to an error page or display an error message
                                window.location.href = '../sign_in.php?error=' + encodeURIComponent(error.message);
                            });
                    }

                    // Add event listener to form submit event
                    form.addEventListener('submit', handleSubmit);
                </script>
            </form>

        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Already Sign up</h3>
                    <p>Log into your account</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="signin.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Don't have any account?</h3>
                    <p>Welcome to bus tickets booking system</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <img src="signup.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="./js/signinup.js"></script>
</body>

</html>