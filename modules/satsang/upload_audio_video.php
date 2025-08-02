<?php
include('includes/db.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type']; // audio/video

    $file = $_FILES['media'];

    // Upload का नाम और लोकेशन सेट करें
    $targetDir = "uploads/";
    $fileName = time() . "_" . basename($file['name']);
    $targetFilePath = $targetDir . $fileName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // अनुमत फाइल फॉर्मेट
    $allowedTypes = ['mp3', 'wav', 'mp4', 'avi', 'mov'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            // DB में दर्ज करें
            $sql = "INSERT INTO media (title, description, file_name, type, uploaded_on)
                    VALUES (:title, :description, :file_name, :type, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'description' => $description,
                'file_name' => $fileName,
                'type' => $type
            ]);

            $message = "✅ फाइल सफलतापूर्वक अपलोड हो गई!";
        } else {
            $message = "❌ फाइल अपलोड में त्रुटि!";
        }
    } else {
        $message = "❌ केवल MP3, WAV, MP4, AVI, MOV फाइलें ही स्वीकार्य हैं!";
    }
}
?>

<?php include('includes/header.php'); ?>

<div class="container mt-4">
    <h2>🎵 Audio/Video अपलोड करें</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>📌 शीर्षक</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>🎥 प्रकार</label>
                <select name="type" class="form-control" required>
                    <option value="">-- चयन करें --</option>
                    <option value="audio">Audio</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label>📝 विवरण</label>
                <textarea name="description" class="form-control" rows="3" placeholder="भजन/प्रवचन का विवरण"></textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label>📁 फाइल चुनें</label>
                <input type="file" name="media" class="form-control" required>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">फाइल अपलोड करें</button>
            </div>
        </div>
    </form>
</div>

<?php include('includes/footer.php'); ?>
