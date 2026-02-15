// ==============================
// Contact form validation
// ==============================
function validateContactForm() {
    const firstNameEl = document.getElementById("first_name");
    const lastNameEl  = document.getElementById("last_name");
    const emailEl     = document.getElementById("email_add");
    const queryEl     = document.getElementById("query");
    const termsEl     = document.getElementById("terms");
    const fileInput   = document.getElementById("attachment");

    // If this page doesn't have the contact form fields, skip safely
    if (!firstNameEl || !lastNameEl || !emailEl || !queryEl || !termsEl || !fileInput) return true;

    const firstName = firstNameEl.value.trim();
    const lastName  = lastNameEl.value.trim();
    const email     = emailEl.value.trim();
    const query     = queryEl.value.trim();
    const terms     = termsEl.checked;

    // Name validation
    const namePattern = /^[A-Za-z]+$/;
    if (!namePattern.test(firstName)) {
        alert("First name must contain letters only.");
        return false;
    }
    if (!namePattern.test(lastName)) {
        alert("Last name must contain letters only.");
        return false;
    }

    // Email validation (simple + reliable)
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Query minimum length
    if (query.length < 10) {
        alert("Message must be at least 10 characters.");
        return false;
    }

    // Terms validation
    if (!terms) {
        alert("You must confirm that you agree to the Privacy Policy before submitting the form.");
        return false;
    }

    // File validation
    if (fileInput.files && fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const maxSize = 2 * 1024 * 1024; // 2MB
        if (file.size > maxSize) {
        alert("File size must be less than 2MB.");
        return false;
        }
    }

    return true;
    }

    // ==============================
    // Create account validation
    // ==============================
    function validateCreateAccountForm(e) {
    const companyId = document.getElementById("company_id")?.value.trim() || "";
    const firstName = document.getElementById("first_name")?.value.trim() || "";
    const lastName  = document.getElementById("last_name")?.value.trim() || "";
    const email     = document.getElementById("company_email")?.value.trim() || "";
    const username  = document.getElementById("username")?.value.trim() || "";
    const password  = document.getElementById("password")?.value || "";
    const confirm   = document.getElementById("confirm_password")?.value || "";

    const companyPattern = /^[A-Za-z0-9]+$/;
    const namePattern = /^[A-Za-z]+$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!companyPattern.test(companyId)) {
        alert("Company ID must contain letters and numbers only (no spaces/symbols).");
        e.preventDefault();
        return;
    }

    if (!namePattern.test(firstName) || !namePattern.test(lastName)) {
        alert("First name and last name must contain letters only.");
        e.preventDefault();
        return;
    }

    if (!emailPattern.test(email)) {
        alert("Please enter a valid company email address.");
        e.preventDefault();
        return;
    }

    if (username.length < 3) {
        alert("Username must be at least 3 characters.");
        e.preventDefault();
        return;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        e.preventDefault();
        return;
    }

    if (password !== confirm) {
        alert("Passwords do not match.");
        e.preventDefault();
        return;
    }
    }

    // ==============================
    // Portal form validation + counter
    // ==============================
    function setupPortalFeatures() {
    // Validate subject/message length on submit
    document.querySelectorAll(".action-form-vertical").forEach((form) => {
        form.addEventListener("submit", function (e) {
        const subjectEl = form.querySelector("input[name='subject']");
        const messageEl = form.querySelector("textarea[name='message']");

        const subject = (subjectEl?.value || "").trim();
        const message = (messageEl?.value || "").trim();

        if (subject.length < 5) {
            alert("Subject must be at least 5 characters.");
            e.preventDefault();
            return;
        }

        if (message.length < 10) {
            alert("Message must be at least 10 characters.");
            e.preventDefault();
            return;
        }
        });
    });

    // Character counter for portal textareas
    document.querySelectorAll(".action-form-vertical textarea").forEach((textarea) => {
        const counter = textarea.closest("form")?.querySelector(".char-count span");
        if (!counter) return;

        const update = () => {
        counter.textContent = textarea.value.length;
        };

        textarea.addEventListener("input", update);
        update();
    });
    }

    // ==============================
    // Attach handlers
    // ==============================
    document.addEventListener("DOMContentLoaded", function () {
    // Contact form
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        contactForm.addEventListener("submit", function (e) {
        if (!validateContactForm()) {
            e.preventDefault();
        }
        });
    }

    // Create account form
    const createForm = document.getElementById("createAccountForm");
    if (createForm) {
        createForm.addEventListener("submit", validateCreateAccountForm);
    }

    // Portal forms + counter
    setupPortalFeatures();
});