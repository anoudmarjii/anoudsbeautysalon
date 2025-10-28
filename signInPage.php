<?php
require 'connect.php';
session_start();

if(isset($_POST['SignInButton'])){
    $EmailAddress = $_POST['EmailAddress'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE EmailAddress = '$EmailAddress' AND password = '$password';";

    $result = mysqli_query($conn, $sql);
    // the result should be 1 row (user and pass)

    $loggedinUser = mysqli_fetch_assoc($result); //betraje3 one by one

    if($loggedinUser){
        $_SESSION['user'] = $EmailAddress;
        header("Location: index.php");
    } else {
        echo "Invalide Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="shortcut icon" href="../assets/anoud's beauty center.png" type="image/x-icon"> <!--add logo-->

    <link rel="stylesheet" href="../css/reset.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/signIn.css">

</head>

<body>
    <!-- <header>
        
    </header> -->

    <main id="SignInPage">
        <section id="SignInPagePart">
            <h2><a href="../index.php"><i class='bx bxs-home-heart'></i></a></h2>
            <h1>Welcome Back</h1>
            <form action="" method="POST">
                <label for="email"> <i class='bx bxs-envelope'></i></label> <!-- for= id-->
                <input type="email" name="EmailAddress" placeholder="Email Address" id="email" autocomplete="email" required>
                <br> <br>
                <label for="password"><i class='bx bxs-lock'></i></label>
                <input type="password" name="password" placeholder="Password" id="password" autocomplete="current-password" required>

                <h5>Forgot your password?</h5>

                <button type="submit" id="submitSignInButton" name="SignInButton">Sign In</button>
                <!-- hidden button below -->
                <button type="button" onclick="location.href='../signUpPage.php'" class="hiddenBtn">
                    Sign Up
                  </button>
            </form>
        </section>

        <section id="SignInSignUpPart">
            <h2>Hello, Beautiful!</h2>
            <p>We're excited to have you join our salon family. Sign up to unlock a world of luxury beauty services,
                tailored just for you. Let's create something beautiful together!</p>
            <h6>Don't have an account? <i class='bx bxs-hand-down'></i></h6>
            <a href="../signUpPage.php"><button type="button">Sign up</button></a>
        </section>


        <footer class="Contact">
            <h3>Contact Us</h3>
            <ul>
                <li><a href="Telephone:+962795870582"><i class='bx bxs-phone'></i></a></li>
                <li><a href="https://www.instagram.com/graphixybyanoud?igsh=MXRwa213aXQzYWQ0NQ=="><i
                            class='bx bxl-instagram-alt'></i></a></li>
                <li><a href="https://www.linkedin.com/in/anoud-marji-245aa5301"><i
                            class='bx bxl-linkedin-square'></i></a>
                </li>
                <li><i class='bx bxs-envelope'></i></li>
            </ul>

            <p>&copy; All Rights Reserved 2024</p>
        </footer>

    </main>
</body>

</html>