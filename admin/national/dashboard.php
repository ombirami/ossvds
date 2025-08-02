<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include('includes/db.php');
include('includes/header.php');
?>

<div class="container mt-4">
    <h2>🙏 स्वागत है, <?= htmlspecialchars($_SESSION['user_name']) ?> जी</h2>
    <p class="text-muted">आपका पद: <?= htmlspecialchars($_SESSION['user_role']) ?></p>

    <div class="row mt-4">
        <!-- Add Member Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5>👥 नया सदस्य जोड़ें</h5>
                    <p>नए सदस्य पंजीकरण हेतु यहां क्लिक करें</p>
                    <a href="add_member.php" class="btn btn-primary">जोड़ें</a>
                </div>
            </div>
        </div>

        <!-- Upload Media -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5>📤 ऑडियो/वीडियो अपलोड करें</h5>
                    <p>भजन/प्रवचन जैसी फाइलें अपलोड करें</p>
                    <a href="upload_audio_video.php" class="btn btn-warning">अपलोड करें</a>
                </div>
            </div>
        </div>

        <!-- View Media -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5>🎧 मीडिया सूची देखें</h5>
                    <p>अपलोड की गई फाइलें देखें और चलाएं</p>
                    <a href="media_list.php" class="btn btn-success">देखें</a>
                </div>
            </div>
        </div>

        <!-- Reports -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5>📊 रिपोर्ट</h5>
                    <p>संगठन की गतिविधियों की रिपोर्ट</p>
                    <a href="reports.php" class="btn btn-secondary">देखें</a>
                </div>
            </div>
        </div>

        <!-- Logout -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5>🚪 लॉगआउट</h5>
                    <p>सेशन समाप्त करें और लॉगआउट करें</p>
                    <a href="logout.php" class="btn btn-danger">लॉगआउट करें</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
