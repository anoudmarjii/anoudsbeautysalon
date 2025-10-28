<?php
require 'connect.php';

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: signInPage.php");
    exit();
} else {
    $userId = $_SESSION['user']; //it will get the email address, la2eno be signin page, in session, we made the id howa el email address 

    $sql = "SELECT FullName, PhoneNumber, EmailAddress, DoB, LoyaltyPoints FROM users WHERE EmailAddress = '$userId';"; //email address is the column name in the database
    $result = mysqli_query($conn, $sql);
    //akeed there wil be a row 
    $user = mysqli_fetch_assoc($result);


    //get appointment details
    $sql2 = "SELECT AppointmentId, Service, Technician, DateAndTime, Notes FROM Appointments WHERE EmailAddress = '$userId';";
    $result2 = mysqli_query($conn, $sql2);

    $appointments = mysqli_fetch_all($result2, MYSQLI_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="shortcut icon" href="../assets/anoud's beauty center.png" type="image/x-icon">

    <!-- <link rel="stylesheet" href="../css/reset.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reset.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <header>
        <section class="header">
            <h2 id="name">Anoud's Beauty Center</h2>
            <nav id="head">
                <ul>
                    <li>
                        <h4 id="signIn"><a href="../logOut.php">Log out</a></h4>
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
        <h2 class="hdn"><a href="../index.php"><i class='bx bxs-home-heart'></i></a></h2>
    </header>

    <main>
        <section id="UserDetails">
            <h1>
                <?php echo 'Welcome ' . $user['FullName'] . ' ' ?><i class="bx bx-heart"></i>
            </h1>
            <h2>User Details</h2>
            <h3>Name:
                <?php echo $user['FullName']; ?>
            </h3>
            <h3>Phone Number:
                <?php echo $user['PhoneNumber']; ?>
            </h3>
            <h3>Email Address:
                <?php echo $user['EmailAddress']; ?>
            </h3>
            <h3>Birthday Date:
                <?php echo $user['DoB']; ?>
            </h3>
            <h3>Loyalty Points:
                <?php echo $user['LoyaltyPoints']; ?>
            </h3>
        </section>

        <h1 id="appointments">My Appointments</h1>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service</th>
                        <th scope="col">Stylist/Technician</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Optional Notes</th>
                        <th scope="col">Update / Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($appointments as $appointment) {
                        $AppointmentId = $appointment['AppointmentId'];
                        $Service = $appointment['Service'];
                        $Technician = $appointment['Technician'];
                        $DateAndTime = $appointment['DateAndTime'];
                        $Notes = $appointment['Notes'];

                        echo "
                    <tr>
                        <th scope='row'>$AppointmentId</th>
                        <td>$Service</td>
                        <td>$Technician</td>
                        <td>$DateAndTime</td>
                        <td>$Notes</td>
                        <td>
                        <a href='updateAppointment.php?AppointmentId=$AppointmentId>' class='btn btn-outline-info'>Update</a>
                        <a href='deleteAppointment.php?AppointmentId=$AppointmentId>' class='btn btn-outline-danger'>Delete</a>

                        </td>
                    </tr>
                   ";
                    } ?>
                    <!-- this is the syntax of the buttons i removed because of the styling of the a -->
                    <!-- <button type='button' class='btn btn-outline-info'><a href='updateAppointment.php?AppointmentId=$AppointmentId'> Update </a></button>  -->
                    <!-- <button type='button'class='btn btn-outline-danger'><a href='deleteAppointment.php?AppointmentId=$AppointmentId'> Delete</button> -->
                </tbody>
            </table>
        </div>

        <div class="logoutBtn">
            <a href="../logOut.php"><button id="Logout">Log out</button></a>
        </div>
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
</body>

</html>