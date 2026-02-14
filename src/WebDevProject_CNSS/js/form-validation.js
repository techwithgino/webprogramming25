// Main form validation
function validateForm() {
    let firstName = document.getElementById("first_name").value.trim();
    let lastName = document.getElementById("last_name").value.trim();
    let email = document.getElementById("email_add").value.trim();
    let query = document.getElementById("query").value.trim();
    let terms = document.getElementById("terms").checked;
    let fileInput = document.getElementById("attachment");

    // Name validation
    let namePattern = /^[A-Za-z]+$/;
    if (!namePattern.test(firstName)) {
        alert("First name must contain letters only.");
        return false;
    }
    if (!namePattern.test(lastName)) {
        alert("Last name must contain letters only.");
        return false;
    }

    // Email validation
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Query minimum length
    if (query.length < 10) {
        alert("Query must be at least 10 characters.");
        return false;
    }

    // Terms validation
    if (!terms) {
        alert("You must accept the Terms and Conditions.");
        return false;
    }

    // File validation
    if (fileInput.files.length > 0) {
        let file = fileInput.files[0];
        let maxSize = 2 * 1024 * 1024; // 2MB
        if (file.size > maxSize) {
            alert("File size must be less than 2MB.");
            return false;
        }
    }

    return true;
}