<?php include 'header.php'; ?>

<h2>Contact Us</h2>

<p>
Ready to improve your IT infrastructure or need expert advice?
Get in touch with CNSS Tech today.
</p>

<p>
<strong>Email:</strong> info@cnsstech.com<br />
<strong>Phone:</strong> +358 41 740 8331
</p>

<h2>Or We Contact You!</h2>

        <form id="contactForm" class="contact-form" action="contact_submit.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" id="company_name" name="company_name">
            </div>

            <div class="form-group">
                <label for="email_add">Email Address</label>
                <input type="email" id="email_add" name="email_add" required>
            </div>

            <div class="form-group">
                <label for="phone_num">Phone Number</label>
                <input type="text" id="phone_num" name="phone_num">
            </div>

            <div class="form-group">
                <label for="query">Message</label>
                <textarea id="query" name="query" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="attachment">Attachment (optional, max 2MB)</label>
                <input type="file" id="attachment" name="attachment">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" id="terms" name="terms" value="1" required>
                    I agree to the Privacy Policy
                </label>
            </div>

            <button type="submit" class="btn">Send Message</button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>

