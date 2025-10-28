<?php
// echo "success delete";

require 'connect.php';

$AppointmentId=$_GET['AppointmentId'];
$sql = "DELETE FROM Appointments WHERE AppointmentId='$AppointmentId';";
$result=mysqli_query($conn,$sql);

if($result){
    header("Location: profile.php");
} else {
    mysqli_error($conn);
}
?>