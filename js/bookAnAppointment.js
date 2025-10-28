// Stylist/Technician options based on service
const technicianOptions = {
    hair: ["Stylist A", "Stylist B", "Stylist C"],
    nails: ["Technician X", "Technician Y", "Technician Z"],
    makeup: ["Artist M", "Artist N", "Artist O"]
};

const servicesDropdown = document.getElementById("services");
const techniciansDropdown = document.getElementById("technicians");

// Update the technicians dropdown based on selected service
servicesDropdown.addEventListener("change", function () {
    const selectedService = this.value;

    // Clear existing options
    techniciansDropdown.innerHTML = '<option value="" disabled selected>--Select a stylist/technician--</option>';

    // Add new options based on the selected service
    if (technicianOptions[selectedService]) {
        technicianOptions[selectedService].forEach(technician => {
            const option = document.createElement("option");
            option.value = technician.toLowerCase().replace(/\s/g, "-"); //sets the value for each technician
            option.textContent = technician;
            techniciansDropdown.appendChild(option);
        });
        techniciansDropdown.disabled = false; // Enable dropdown
    } else {
        techniciansDropdown.disabled = true; // Disable dropdown
    }
});


//for submission popup
function confirmSubmit() {
    // Display the confirmation dialog
    var userConfirmed = confirm("Are you sure you want to book the appointment?");

    // If user clicks "OK", submit the form and show the thank you message
    if (userConfirmed) {
        // Submit the form
        document.getElementById('submissionForm').submit();

        // After submission, show the thank you message
        alert("Thank you for booking! You have received a confirmation message, and 20 loyalty points have been added to your account. See you soon gorgeous!");

        return true; // Allow the form to submit
    } else {
        // If user clicks "Cancel", prevent form submission
        return false;
    }
}


// for the database part (dynamically display the data from the database)
document.addEventListener('DOMContentLoaded', function() {
    // 1) Force a "change" event on #services to populate the #technicians
    servicesDropdown.dispatchEvent(new Event('change'));

    // 2) Now select the correct technician from the DB
    techniciansDropdown.value = "<?php echo $techJS; ?>";
});