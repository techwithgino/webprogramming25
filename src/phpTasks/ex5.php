<?php
include 'header.php';

$readmeFile = 'readme.md';

$readmeContent = '';
if (file_exists($readmeFile)) {
    $readmeContent = file_get_contents($readmeFile);
} else {
    $readmeContent = "Error: readme.md file not found.";
}
?>

<main>
    <div class="container">
        <h2>Project Plan (readme.md)</h2>
        <pre style="text-align: left; white-space: pre-wrap; background-color: #f0f0f0; padding: 20px; border-radius: 5px; overflow-x: auto;">
<?php echo htmlspecialchars($readmeContent); ?>
        </pre>
    </div>
</main>

<?php
include 'footer.php';
?>