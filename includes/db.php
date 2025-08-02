<?php
$host = 'localhost';        // सर्वर का नाम (Localhost ही रखें)
$db   = 'ossvds';           // आपका डेटाबेस नाम
$user = 'root';             // डिफ़ॉल्ट MySQL यूज़रनेम (XAMPP/WAMP में root)
$pass = '';                 // पासवर्ड खाली (XAMPP/WAMP में डिफ़ॉल्ट)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    // PDO Error Mode सेट करें
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("🔴 डेटाबेस कनेक्शन विफल: " . $e->getMessage());
}
?>
