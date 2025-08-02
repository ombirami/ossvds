<?php
session_start();            // सेशन शुरू करें (यदि चल रहा हो)
session_unset();            // सभी सेशन वेरिएबल्स हटाएं
session_destroy();          // सेशन पूरी तरह समाप्त करें

// वापस login पेज पर भेजें
header("Location: login.php");
exit;
