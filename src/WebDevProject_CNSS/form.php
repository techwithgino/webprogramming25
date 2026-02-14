<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2>Submit Your Query</h2>

    <form name="form1" method="post" action="process.php" 
          onsubmit="return validateForm()" enctype="multipart/form-data">

        <!-- First & Last Name -->
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           onkeyup="checkName()" placeholder="Enter first name" required>
                </div>
                <div class="col">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           placeholder="Enter last name" required>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email_add">Email Address:</label>
            <input type="email" class="form-control" id="email_add" name="email_add"
                   onblur="checkEmail()" placeholder="Enter email address" required>
        </div>

        <!-- Company Name -->
        <div class="form-group">
            <label for="company_name">Company Name (Optional):</label>
            <input type="text" class="form-control" id="company_name" name="company_name"
                   placeholder="Enter company name">
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone_num">Phone Number (Optional):</label>
            <input type="text" class="form-control" id="phone_num" name="phone_num"
                   placeholder="Enter phone number">
        </div>

        <!-- Query -->
        <div class="form-group">
            <label for="query">Your Query:</label>
            <textarea class="form-control" id="query" name="query" rows="5" maxlength="500"
                      placeholder="Type your query here (min 10 characters)" required></textarea>
        </div>

        <!-- File Upload -->
        <div class="form-group">
            <label for="attachment">Attach a file (Optional, max 2MB):</label>
            <input type="file" class="form-control" id="attachment" name="attachment" 
                   accept=".pdf,.doc,.docx,.png,.jpg">
        </div>

        <!-- Terms & Conditions -->
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="terms" name="terms"
                   onclick="termsClicked()" required>
            <label class="form-check-label" for="terms">
                I agree to the <a href="terms.php" target="_blank">Terms and Conditions</a>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

    </form>
</div>

<!-- JS Validation -->
<script>
// Main form validation
function validateForm() {
    let firstName = document.getElementById("first_name").value.trim();
    let lastName  = document.getElementById("last_name").value.trim();
    let email     = document.getElementById("email_add").value.trim();
    let query     = document.getElementById("query").value.trim();
    let terms     = document.getElementById("terms").checked;
    let fileInput = document.getElementById("attachment");

    // Name validation (letters only)
    let namePattern = /^[A-Za-z]+$/;
    if (!namePattern.test(firstName)) { alert("First name must contain letters only."); return false; }
    if (!namePattern.test(lastName))  { alert("Last name must contain letters only."); return false; }

    // Email validation
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!emailPattern.test(email)) { alert("Please enter a valid email address."); return false; }

    // Query length
    if (query.length < 10) { alert("Query must be at least 10 characters."); return false; }

    // Terms checkbox
    if (!terms) { alert("You must accept the Terms and Conditions."); return false; }

    // File validation
    if (fileInput.files.length > 0) {
        let file = fileInput.files[0];
        let allowedExtensions = ['pdf','doc','docx','png','jpg'];
        let fileExt = file.name.split('.').pop().toLowerCase();
        if (!allowedExtensions.includes(fileExt)) { alert("Invalid file type."); return false; }
        if (file.size > 2*1024*1024) { alert("File too large. Max 2MB."); return false; }
    }

    return true;
}

// onkeyup event
function checkName() {
    let firstName = document.getElementById("first_name");
    let lastName  = document.getElementById("last_name");
    let pattern = /^[A-Za-z]*$/;

    firstName.style.border = pattern.test(firstName.value) ? "2px solid green" : "2px solid red";
    lastName.style.border  = pattern.test(lastName.value)  ? "2px solid green" : "2px solid red";
}

// onblur event
function checkEmail() {
    let email = document.getElementById("email_add").value;
    if (email === "") alert("Email cannot be empty.");
}

// onclick event
function termsClicked() {
    console.log("Terms checkbox clicked.");
}
</script>

<?php include 'footer.php'; ?>