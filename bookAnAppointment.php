<?php
require 'connect.php';

session_start();

//to get user's data
if (!isset($_SESSION['user'])) {
    header("Location: signInPage.php");
} else {
    $userInfo = $_SESSION['user']; //email address
    $sql = "SELECT FullName, PhoneNumber, EmailAddress FROM users WHERE EmailAddress = '$userInfo';";
    $result = mysqli_query($conn, $sql);

    $userData = mysqli_fetch_assoc($result);
}

//to save the appointment in the database
if (isset($_POST['Submit'])) {
    $EmailAddress = $userData['EmailAddress'];
    $Service = $_POST['Service'];
    $Technician = isset($_POST['Technician']) && !empty($_POST['Technician']) ? $_POST['Technician'] : NULL;
    $DateAndTime = $_POST['DateAndTime'];
    $Notes = isset($_POST['Notes']) ? $_POST['Notes'] : NULL;

    $sql = "INSERT INTO Appointments (EmailAddress, Service, Technician, DateAndTime, Notes) VALUES ('$EmailAddress','$Service', '$Technician', '$DateAndTime', '$Notes')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $sqlPoints = "UPDATE users
                  SET LoyaltyPoints = LoyaltyPoints + 20
                  WHERE EmailAddress = '$userInfo'";
        mysqli_query($conn, $sqlPoints);
        
        header("Location: index.php");
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
    <title>Book an Appointment</title>
    <link rel="shortcut icon" href="../assets/anoud's beauty center.png" type="image/x-icon"> <!--add logo-->

    <link rel="stylesheet" href="../css/reset.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/bookAnAppointment.css">
</head>

<body>

    <header>
        <section class="header">
            <h2 id="name">Anoud's Beauty Center</h2>
            <nav id="head">
                <ul>
                    <li>
                        <h4 id="signIn"><a href="../profile.php">Profile</a></h4>
                    </li>
                    <li>
                        <h4><a href="../index.php#Gifts">Gifts</a></h4>
                    </li>
                    <li>
                        <h4><a href="../index.php#Contact">Contact</a></h4>
                    </li>
                    <li>
                        <h4><a href="../index.php#About">About Us</a></h4>
                    </li>
                    <li>
                        <h4><a href="../index.php#Services">Services</a></h4>
                    </li>
                    <li>
                        <h4><a href="../index.php">Home</a></h4>
                    </li>
                </ul>
            </nav>
        </section>

        <section id="hambNav">
            <h1><a href="../profile.css"><i class='bx bx-menu'></i></a></h1>
            <div class="dropdown-content">
                <p><a href="../index.php#imagepart">Home</a></p>
                <p><a href="../index.php#Services">Services</a></p>
                <p><a href="../index.php#About">About Us</a></p>
                <p><a href="../index.php#Contact">Contact</a></p>
                <p><a href="../index.php#Gifts">Gifts</a></p>
            </div>
        </section>
    </header>

    <main>
        <h1>Book Appointment</h1>
        <form action="" onsubmit="return confirmSubmit()" id="submissionForm" method="POST">
            <label for="services">Please select service:</label>
            <select id="services" name="Service" autocomplete="off" required>
                <option value="" disabled selected>--Please choose a service--</option>
                <option value="hair">Hair</option>
                <option value="makeup">Makeup</option>
                <option value="nails">Nails</option>
            </select>

            <!-- Stylist/Technician Selection -->
            <label for="technicians">Choose Stylist/Technician Preference (Optional):</label>
            <select id="technicians" name="Technician" autocomplete="off" disabled>
                <option value="" disabled selected>--Select a stylist/technician--</option>
            </select>

            <label for="dateandtime">Please select date and time:</label>
            <input type="datetime-local" name="DateAndTime" id="dateandtime" autocomplete="off" required>

            <label for="FullName">Name:</label>
            <input type="text" name="FullName" id="FullName" autocomplete="name" placeholder="Full Name"
                value="<?php echo $userData['FullName']; ?>" required>

            <label for="PhoneNumber">Phone Number:</label>
            <input type="text" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number"
                value="<?php echo $userData['PhoneNumber']; ?>" autocomplete="tel" required>

            <label for="EmailAddress">Email:</label>
            <input type="email" name="EmailAddress" id="EmailAddress" placeholder="Email Address"
                value="<?php echo $userData['EmailAddress']; ?>" autocomplete="email" required>

            <label for="Notes">Notes:</label>
            <input type="text" name="Notes" id="Notes" placeholder="Additional Notes (Optional)" autocomplete="off">

            <h6>Please choose how would you receive the confirmation message:</h6>
            <div id="radio">
                <div>
                    <input type="radio" name="ConfirmationMsg" id="smsradio" value="sms" autocomplete="off">
                    <label for="smsradio" id="smslabel">SMS</label>
                </div>
                <div>
                    <input type="radio" name="Email" id="emailradio" value="email" autocomplete="off">
                    <label for="emailradio" id="emaillabel">Email</label>
                </div>

            </div>
            <button type="submit" name="Submit">Submit</button>
        </form>
    </main>

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

    <script src="../js/bookAnAppointment.js"></script>
</body>

</html>