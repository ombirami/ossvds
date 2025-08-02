<?php
$host = 'localhost';        // सर्वर का नाम (Localhost ही रखें)
$db   = 'u977488674_ossvds';           // आपका डेटाबेस नाम
$user = 'u977488674_root';             // MySQL यूज़रनेम
$pass = 'Ombirami@1';                 // पासवर्ड

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // PDO Error Mode सेट करें
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("🔴 डेटाबेस कनेक्शन विफल: " . $e->getMessage());
}
?>
