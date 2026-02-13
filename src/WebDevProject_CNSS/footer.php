<footer>
    <p>
        &copy; 2026 CNSS Tech. All rights reserved.
    </p>
    <p>
        Driving Business Move Forward with Technology.
    </p>
    <?php
    $filename = basename($_SERVER['PHP_SELF']);
    $modified = date("F d Y H:i:s", filemtime($filename));
    echo "<p>Last Modified: $modified</p>";
    ?>
</footer>
</div>
</body>
</html>