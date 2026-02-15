<?php
session_start();

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit();
}

include 'header_portal.php';
?>

<?php if (isset($_GET["error"])): ?>
    <div style="color:#e11d48; font-weight:600; margin: 1rem 0;">
        <?php
        $e = $_GET["error"];
        if ($e === "not_found") echo "Ticket not found (or you don’t have access).";
        elseif ($e === "bad_search") echo "Please choose a type and enter a ticket number.";
        else echo "Something went wrong.";
        ?>
    </div>
    
<?php endif; ?>

<!-- HERO (with portal background class + sign out icon) -->
<section class="hero portal-hero">
    <div class="container hero-flex">

        <div class="hero-text">
        <h2>CNSS Tech Case Management Portal</h2>
        <p>
            Welcome! Choose an option below to report a case, submit a request, ask an inquiry,
            or search by Case Number, Request Number or Inquiry Number.
        </p>

        </div>

    </div>
    </section>

    <section id="portal-actions">
    <div class="container">

        <!-- SEARCH (strip) -->
        <div class="search-strip">
        <form action="search.php" method="get" class="search-form">
            <label for="search_type">Search:</label>

            <select id="search_type" name="type" required>
            <option value="">Select Type</option>
            <option value="case">Case Number</option>
            <option value="request">Request Number</option>
            <option value="inquiry">Inquiry Number</option>
            </select>

            <input type="text" name="q" placeholder="Enter Reference Number" required>

            <button type="submit">Search</button>
        </form>
        </div>

        <!-- REPORT A CASE -->
        <div class="action-strip">
            <form action="portal_submit.php" method="post" class="action-form-vertical">
            <input type="hidden" name="entry_type" value="case">

            <div class="action-row">
                <strong>Report a Case:</strong>
                <input type="text" name="subject" placeholder="Case Subject" required>
            </div>

            <textarea name="message"
                placeholder="Describe your issue in detail (max 5000 characters)..."
                maxlength="5000"
                required></textarea>

            <div class="action-bottom">
                <div class="char-count"><span>0</span> / 5000 characters</div>
                <button type="submit" class="action-btn">Submit</button>
            </div>
            </form>
        </div>

        <!-- SUBMIT A REQUEST -->
        <div class="action-strip">
            <form action="portal_submit.php" method="post" class="action-form-vertical">
            <input type="hidden" name="entry_type" value="request">

            <div class="action-row">
                <strong>Submit a Request:</strong>
                <input type="text" name="subject" placeholder="Request Subject" required>
            </div>

            <textarea name="message"
                placeholder="Provide additional details (max 5000 characters)..."
                maxlength="5000"
                required></textarea>

            <div class="action-bottom">
                <div class="char-count"><span>0</span> / 5000 characters</div>
                <button type="submit" class="action-btn">Submit</button>
            </div>
            </form>
        </div>

        <!-- ASK AN INQUIRY -->
        <div class="action-strip">
            <form action="portal_submit.php" method="post" class="action-form-vertical">
            <input type="hidden" name="entry_type" value="inquiry">

            <div class="action-row">
                <strong>Ask an Inquiry:</strong>
                <input type="text" name="subject" placeholder="Inquiry Subject" required>
            </div>

            <textarea name="message"
                placeholder="Enter your message (max 5000 characters)..."
                maxlength="5000"
                required></textarea>

            <div class="action-bottom">
                <div class="char-count"><span>0</span> / 5000 characters</div>
                <button type="submit" class="action-btn">Submit</button>
            </div>
            </form>
        </div>

    </div>
    </section>

    <script>
    // Character counter for all portal textareas
    document.querySelectorAll(".action-form-vertical textarea").forEach(textarea => {
        const counter = textarea.closest("form").querySelector(".char-count span");
        const update = () => counter.textContent = textarea.value.length;
        textarea.addEventListener("input", update);
        update();
    });
</script>

<div class="portal-signout">
    <a href="logout.php">Sign out</a>
</div>

<?php include 'footer.php'; ?>