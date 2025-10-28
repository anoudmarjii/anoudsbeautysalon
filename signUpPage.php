<?php
require 'connect.php';

if (isset($_POST['signUpButton'])) {
    $FullName = $_POST['FullName'];
    $EmailAddress = $_POST['EmailAddress'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $DoB = $_POST['DoB'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (FullName, EmailAddress, PhoneNumber, DoB, password) VALUES ('$FullName', '$EmailAddress', '$PhoneNumber', '$DoB', '$password');";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: signInPage.php");
    } else {
        mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="../assets/anoud's beauty center.png" type="image/x-icon"> <!--add logo-->

    <link rel="stylesheet" href="../css/reset.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="../css/signUp.css"> -->
    <link rel="stylesheet" href="../css/signUp.css">

</head>

<body>
    <!-- <header>

    </header> -->

    <body>
        <main id="SignUpPage">
            <section id="SignUpSignInPart">
                <h2 id="home"><a href="../index.php"><i class='bx bxs-home-heart'></i></a></h2>
                <h2>Hello, Gorgeous!</h2>
                <p>We're delighted to have you here. Discover a world of elegance and relaxation tailored just for you.
                    Book an appointment to pamper yourself with our exclusive hair, makeup, and nail services. Your
                    luxury experience starts here!
                </p>
                <h6> Already have an account? <i class='bx bxs-hand-down'></i></h6>
                <a href="../signInPage.php"><button type="button">Sign in</button></a>
            </section>

            <section id="SignUpPagePart">
                <h2 id="homehidden"><a href="../index.php"><i class='bx bxs-home-heart'></i></a>
                </h2>
                <h1>Create Account</h1>
                <form action="" method="POST" autocomplete="off">
                    <label for="fullName"><i class='bx bxs-user'></i></label>
                    <input type="text" name="FullName" id="fullName" placeholder="Full Name" autocomplete="off" required>

                    <label for="email"><i class='bx bxs-envelope'></i></label>
                    <input type="email" name="EmailAddress" id="email" placeholder="Email Address" autocomplete="off" required>

                    <label for="phone"><i class='bx bxs-phone'></i></label>
                    <input type="tel" name="PhoneNumber" id="phone" placeholder="Phone Number" pattern="^07[789]\d{7}$"
                    autocomplete="off" required>

                    <label for="DoB"><i class='bx bxs-calendar'></i> Birthday</label>
                    <input type="date" name="DoB" id="DoB" autocomplete="off" required>

                    <label for="password"><i class='bx bxs-lock-alt'></i></label>
                    <input type="password" name="password" id="password"
                        placeholder="Choose a password (8 digits minimum)" autocomplete="off" required>

                    <label for="confirmPassword"><i class='bx bxs-lock-alt'></i></label>
                    <input type="password" name="confirmPassword" id="confirmPassword"
                        placeholder="Confirm your password" autocomplete="off" required>

                    <p id="password-error"></p>

                    <div class="checkbox-container">
                        <input type="checkbox" name="ReceiveEmails" id="receiveEmails" autocomplete="off" checked>
                        <!-- should add the 0 if unchecked using php -->
                        <label for="receiveEmails">Receive emails with the latest updates and exclusive offers</label>
                    </div>

                    <button type="submit" id="submitSignUpButton" name="signUpButton">Sign Up</button>
                    <!-- below the hidden sign in button  -->
                    <button type="button" onclick="location.href='../signInPage.php'"
                        class="hiddenBtn">
                        Sign In
                    </button>
                </form>
            </section>

    </body>

    <footer class="Contact">
        <h3>Contact Us</h3>
        <ul>
            <li><a href="Telephone:+962795870582"><i class='bx bxs-phone'></i></a></li>
            <li><a href="https://www.instagram.com/graphixybyanoud?igsh=MXRwa213aXQzYWQ0NQ=="><i
                        class='bx bxl-instagram-alt'></i></a></li>
            <li><a href="https://www.linkedin.com/in/anoud-marji-245aa5301"><i class='bx bxl-linkedin-square'></i></a>
            </li>
            <li><i class='bx bxs-envelope'></i></li>
        </ul>

        <p>&copy; All Rights Reserved 2024</p>
    </footer>

    <script src="../js/signUpPage.js"></script>
</body>

</html>