<?php
require 'connect.php';

session_start();

$AppointmentId = $_GET['AppointmentId'];
$sql = "SELECT Service, Technician, DateAndTime, Notes FROM Appointments WHERE AppointmentId='$AppointmentId';";

$result = mysqli_query($conn, $sql); /*ra7 request, now one row will be the response */
$appointmentDetail = mysqli_fetch_assoc($result); /*fetch row by row (1 row) */

$Service = $appointmentDetail['Service'];
$Technician = $appointmentDetail['Technician'];
$DateAndTime = $appointmentDetail['DateAndTime'];
$Notes = $appointmentDetail['Notes'];

// user details
$userId = $_SESSION['user']; //it will get the email address, la2eno be signin page, in session, we made the id howa el email address 

$sql = "SELECT FullName, PhoneNumber, EmailAddress FROM users WHERE EmailAddress = '$userId';"; //email address is the column name in the database
$result2 = mysqli_query($conn, $sql);
//akeed there wil be a row 
$user = mysqli_fetch_assoc($result2);

$FullName = $user['FullName'];
$PhoneNumber = $user['PhoneNumber'];
$EmailAddress = $user['EmailAddress'];

// Convert "2024-01-23 14:30:00" to "2024-01-23T14:30:00"
$datetimeValue = str_replace(' ', 'T', $DateAndTime); //we use this variable below: converted format of the time

// Convert the DB Technician to the same lowercase-hyphen format
$techJS = strtolower(str_replace(' ', '-', $Technician));

//update button
if(isset($_POST['Update'])){
    $Service= $_POST['Service'];
    $Technician= $_POST['Technician'];
    $DateAndTime= $_POST['DateAndTime'];
    $EmailAddress= $_POST['EmailAddress'];
    $Notes= $_POST['Notes'];

    $sqlUpdate = "UPDATE Appointments SET Service='$Service', Technician='$Technician', DateAndTime='$DateAndTime', EmailAddress='$EmailAddress', Notes='$Notes' WHERE AppointmentId='$AppointmentId';";

    $update= mysqli_query($conn, $sqlUpdate);

    if($update){
    header("Location: profile.php");
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
    <title>Update Appointment</title>
    <link rel="shortcut icon" href="../assets/anoud's beauty center.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/reset.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/updateAppointment.css">
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
    <h2 id="backarrow"><a href="../profile.php"><i class='bx bx-left-arrow-alt'></i></a></h2>
        <section id="updateAppointments">
            <h1>Update Appointment</h1>
            <form action="" method="POST" id="updateAppointments">
                <label for="services">Please select service:</label>
                <select id="services" name="Service" autocomplete="off" required>
                    <option value="" disabled selected>--Please choose a service--</option>
                    <option value="hair" <?php if ($Service == 'hair') echo 'selected'; ?>>Hair</option>
                    <option value="makeup" <?php if ($Service == 'makeup') echo 'selected'; ?>>Makeup</option>
                    <option value="nails" <?php if ($Service == 'nails') echo 'selected'; ?>>Nails</option>
                </select>

                <!-- Stylist/Technician Selection -->
                <label for="technicians">Choose Stylist/Technician Preference (Optional):</label>
                <select id="technicians" name="Technician" autocomplete="off">
                    <option value="">--Select a stylist/technician--</option>
                    <!-- JS populates the rest -->
                </select>

                <label for="dateandtime">Please select date and time:</label>
                <input type="datetime-local" name="DateAndTime" id="dateandtime" required autocomplete="off" value="<?php echo $datetimeValue; ?>">

                <label for="EmailAddress">Email:</label>
                <input type="email" name="EmailAddress" id="EmailAddress" placeholder="Email Address"
                    value="<?php echo $EmailAddress; ?>" required autocomplete="email">

                <label for="Notes">Notes:</label>
                <input type="text" name="Notes" id="Notes" 
                value="<?php echo $Notes; ?>"
                placeholder="Additional Notes (Optional)" autocomplete="off">

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

                <div class="updateBtn">
                    <button type="submit" name="Update" id="updateBtn">Update</button>
                </div>

            </form>
        </section>
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

    <!-- <script src="../js/updateAppointment.js"></script> -->
</body>

</html>