<footer>
    <p>&copy; 2026 Web Programming. All rights reserved.</p>
    <?php
    $filename = basename($_SERVER['PHP_SELF']);
    $modified = date("F d Y H:i:s", filemtime($filename));
    echo "<p>Last Modified: $modified</p>";
    ?>
</footer>

</body>
</html>