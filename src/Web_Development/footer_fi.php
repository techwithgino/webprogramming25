<footer>
    <p>&copy; 2026 CNSS Tech. Teknologialla liiketoiminnan eteenpäinvieminen.</p>

    <?php
    $filename = basename($_SERVER['PHP_SELF']);
    setlocale(LC_TIME, 'fi_FI.UTF-8');
    $modified = filemtime($filename);
    $formatted = strftime("%d. %B %Y %H:%M:%S", $modified);
    echo "<p>Viimeksi muokattu: $formatted</p>";
    ?>
    
    <p>Kaikki oikeudet pidätetään.</p>
</footer>