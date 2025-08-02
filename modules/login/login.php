<?php
session_start();
include('includes/db.php');

// यदि लॉगिन किया हुआ है तो dashboard पर भेजें
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // सफल लॉगिन
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "❌ उपयोगकर्ता नाम या पासवर्ड गलत है।";
    }
}
?>

<?php include('includes/header.php'); ?>

<div class="container" style="max-width: 500px; margin-top: 60px;">
    <h3 class="text-center">🔐 संगठन लॉगिन</h3>

    <?php if ($error): ?>
        <div style="color: red; text-align: center; margin-bottom: 10px;">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group mb-3">
            <label>👤 उपयोगकर्ता नाम</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>🔑 पासवर्ड</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning w-100">लॉगिन करें</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
