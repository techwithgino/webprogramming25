<?php include 'header.php'; ?>

<section class="contact-page">
    <div class="container contact-wrap">

        <h2 class="contact-title">Create Account Portal</h2>
        <p style="max-width: 820px; color:#4b5563; margin: 0 0 2rem 0;">
        As a valued CNSS Tech customer, you may create your account to manage your company’s Case
        Management Portal and related services. The portal allows you to submit new cases, monitor
        ongoing cases, update information, and communicate directly with our technical support team.
        </p>

        <form action="create_acc_submit.php" method="post" class="contact-form">

        <div class="form-grid">

            <!-- LEFT COLUMN -->
            <div class="form-col">

            <div class="field">
                <label for="company_id">Company ID <span class="req">*</span></label>
                <input class="flat-input" type="text" id="company_id" name="company_id" required>
            </div>

            <div class="field">
                <label for="first_name">First Name <span class="req">*</span></label>
                <input class="flat-input" type="text" id="first_name" name="first_name" required>
            </div>

            <div class="field">
                <label for="last_name">Last Name <span class="req">*</span></label>
                <input class="flat-input" type="text" id="last_name" name="last_name" required>
            </div>

            <div class="field">
                <label for="company_email">Company Email <span class="req">*</span></label>
                <input class="flat-input" type="email" id="company_email" name="company_email" required>
            </div>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="form-col">

            <div class="field">
                <label for="username">Username <span class="req">*</span></label>
                <input class="flat-input" type="text" id="username" name="username" required>
            </div>

            <div class="field">
                <label for="password">Password <span class="req">*</span></label>
                <input class="flat-input" type="password" id="password" name="password" required>
            </div>

            <div class="field">
                <label for="confirm_password">Confirm Password <span class="req">*</span></label>
                <input class="flat-input" type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="consent-row">
                <label class="checkbox-line">
                <input type="checkbox" name="terms" value="1" required>
            <span>
                I accept the 
                <a href="#" id="openTerms" style="color:#00887A; text-decoration: underline;">
                    Terms &amp; Conditions
                </a>
                <span class="req">*</span>
            </span>
                </label>
            </div>

            <div class="actions-row">
                <button type="submit" class="btn-pill">Create Account</button>
            </div>

            </div>

        </div>

        <p class="fineprint">
            By submitting this form, your registration will be reviewed by our team. You will be notified once your
            account has been verified and approved.
        </p>

        </form>

    </div>
</section>

    <!-- TERMS MODAL -->
    <div id="termsModal" class="terms-modal">
    <div class="terms-content">
        
        <span class="terms-close" id="closeTerms">&times;</span>

        <h2>Terms & Conditions</h2>

        <div class="terms-scroll">

        <p><strong>Effective Date:</strong> <?php echo date("F d, Y"); ?></p>

        <h3>1. Acceptance of Terms</h3>
        <p>By creating an account, you agree to these Terms & Conditions.</p>

        <h3>2. Services</h3>
        <p>CNSS Tech provides IT network services, consultancy, and support services.</p>

        <h3>3. Account Responsibility</h3>
        <p>You are responsible for maintaining the confidentiality of your login credentials.</p>

        <h3>4. User Conduct</h3>
        <ul>
            <li>No unlawful use</li>
            <li>No system abuse</li>
            <li>No false submissions</li>
        </ul>

        <h3>5. Data Protection</h3>
        <p>Your data will be handled securely and used only for service purposes.</p>

        <h3>6. Limitation of Liability</h3>
        <p>CNSS Tech is not liable for indirect damages resulting from service use.</p>

        <h3>7. Governing Law</h3>
        <p>These terms are governed by the laws of Finland.</p>

        <p style="margin-top:1.5rem;">
            By continuing, you acknowledge and accept these Terms & Conditions.
        </p>

        </div>

    </div>
    </div>

        <script>
    document.getElementById("openTerms").onclick = function(e) {
        e.preventDefault();
        document.getElementById("termsModal").style.display = "flex";
    };

    document.getElementById("closeTerms").onclick = function() {
        document.getElementById("termsModal").style.display = "none";
    };

    window.onclick = function(event) {
        const modal = document.getElementById("termsModal");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
    </script>

<?php include 'footer.php'; ?>