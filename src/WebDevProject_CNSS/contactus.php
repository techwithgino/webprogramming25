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

<form class="contact-form" action="#" method="post">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="coname">Company Name</label>
            <input type="text" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="number">Phone Number</label>
            <input type="number" id="number" name="name">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn">Send Message</button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>

