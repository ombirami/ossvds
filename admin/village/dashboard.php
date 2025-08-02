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
    <h2 class="text-center">🙏 स्वागत है, <?= htmlspecialchars($_SESSION['user_name']) ?> जी</h2>
    <p class="text-center text-muted">आपका संगठनात्मक पद: <strong><?= htmlspecialchars($_SESSION['user_role']) ?></strong></p>

    <div class="row mt-5">

        <!-- सदस्य जोड़ना -->
        <div class="col-md-4 mb-4">
            <div class="card border-success h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">👥 नया सदस्य जोड़ें</h5>
                    <p class="card-text">संगठन में नए कार्यकर्ता जोड़ें</p>
                    <a href="add_member.php" class="btn btn-success">जोड़ें</a>
                </div>
            </div>
        </div>

        <!-- मीडिया अपलोड -->
        <div class="col-md-4 mb-4">
            <div class="card border-warning h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">📤 भजन / प्रवचन अपलोड</h5>
                    <p class="card-text">वाणी, गीत, प्रवचन आदि संग्रहित करें</p>
                    <a href="upload_audio_video.php" class="btn btn-warning">अपलोड करें</a>
                </div>
            </div>
        </div>

        <!-- मीडिया लिस्ट -->
        <div class="col-md-4 mb-4">
            <div class="card border-info h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">🎧 मीडिया सूची</h5>
                    <p class="card-text">सभी रिकॉर्ड देखना और सुनना</p>
                    <a href="media_list.php" class="btn btn-info">देखें</a>
                </div>
            </div>
        </div>

        <!-- चुनाव नियंत्रण -->
        <div class="col-md-4 mb-4">
            <div class="card border-primary h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">🗳️ चुनाव नियंत्रण</h5>
                    <p class="card-text">संगठनात्मक चुनाव प्रबंधन</p>
                    <a href="election_control.php" class="btn btn-primary">प्रवेश करें</a>
                </div>
            </div>
        </div>

        <!-- रिपोर्ट्स -->
        <div class="col-md-4 mb-4">
            <div class="card border-secondary h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">📊 रिपोर्टें</h5>
                    <p class="card-text">कार्यकर्ताओं, गतिविधियों की रिपोर्ट</p>
                    <a href="reports.php" class="btn btn-secondary">देखें</a>
                </div>
            </div>
        </div>

        <!-- लॉगआउट -->
        <div class="col-md-4 mb-4">
            <div class="card border-danger h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">🚪 लॉगआउट</h5>
                    <p class="card-text">सत्र समाप्त करें</p>
                    <a href="logout.php" class="btn btn-danger">लॉगआउट</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('includes/footer.php'); ?>
