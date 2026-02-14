<?php include 'header.php'; ?>

<div class="login-page">
    <div class="login-layout">

        <!-- LEFT SIDE: SUPPORT INFORMATION -->
        <div class="login-support">
            <h3>Support & Assistance</h3>

            <p>
                Our experts are available to assist you with support and maintenance issues 
                on weekdays from <strong>8:00 AM to 4:00 PM</strong>.
            </p>

            <p>
                As our contract customer, you can also send your support request directly by email to 
                <strong>cnsstech@support.fi</strong>.
            </p>

            <p>
                In urgent matters, we recommend contacting us by phone at 
                <strong>041 7408 331</strong>.
            </p>
        </div>


        <!-- RIGHT SIDE: LOGIN CARD -->
        <div class="login-card">
            <h2 class="login-title">CNSS Tech Sign In Portal</h2>
            <p class="login-subtitle">Enter your sign in credentials</p>

            <form id="loginForm" action="login_process.php" method="POST" class="login-form">
                <div class="login-field">
                    <label for="company_id">Company ID</label>
                    <input type="text" name="company_id" id="company_id" required>
                </div>

                <div class="login-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="login-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <button type="submit" class="login-btn">Sign In</button>
            </form>

            <p class="login-help">
                Having trouble signing in? <a href="form.php">Contact Us</a>
            </p>

            <p class="login-help">
                Don't have an account yet? <a href="create_acc.php">Create an Account</a>
            </p>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>