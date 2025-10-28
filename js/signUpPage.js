// src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"

const passwordField = document.getElementById('password');
const confirmField = document.getElementById('confirmPassword');
const errorMsg = document.getElementById('password-error');
const form = document.querySelector('form'); //selct form
const successAlert = document.getElementById('success-alert');

function checkPasswordsMatch() {
    if (confirmField.value.trim() !== passwordField.value.trim()) {
        errorMsg.style.display = 'block';
        errorMsg.textContent = "Passwords do not match!";
    } else {
        errorMsg.style.display = 'none';
    }
}

// Real-time checking as user types
passwordField.addEventListener('input', checkPasswordsMatch);
confirmField.addEventListener('input', checkPasswordsMatch);

// Final check on form submit
form.addEventListener('submit', (event) => {
    // If mismatch, stop submission
    if (passwordField.value.trim() !== confirmField.value.trim()) {
        event.preventDefault();
        errorMsg.style.display = 'block';
        errorMsg.textContent = "Passwords do not match!";
    } else {
        errorMsg.style.display = 'none';
        // Show success alert
        alert("You have signed up successfully!");
    }
});
