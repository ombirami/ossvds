<?php
$uploadSuccess = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_photo'])) {
    $targetDir = "profile_photos/";
    $fileName = basename($_FILES["profile_photo"]["name"]);
    $targetFile = $targetDir . uniqid() . "_" . $fileName;

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $validTypes = ["jpg", "jpeg", "png", "gif"];

    if (in_array($imageFileType, $validTypes)) {
        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $targetFile)) {
            $uploadSuccess = "✅ फोटो सफलतापूर्वक अपलोड हो गई!";
            $uploadedImage = $targetFile;
        } else {
            $uploadSuccess = "❌ क्षमा करें, फ़ाइल अपलोड नहीं हो सकी।";
        }
    } else {
        $uploadSuccess = "❌ केवल JPG, JPEG, PNG, और GIF फॉर्मेट ही मान्य हैं।";
    }
}
?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <title>प्रोफ़ाइल फोटो अपलोड करें</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container" style="max-width: 500px; margin: auto; padding-top: 50px;">
        <h2>📷 प्रोफ़ाइल फोटो अपलोड करें</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_photo" accept="image/*" required><br><br>
            <button type="submit">अपलोड करें</button>
        </form>

        <?php if ($uploadSuccess): ?>
            <p style="margin-top: 20px;"><?php echo $uploadSuccess; ?></p>
            <?php if (isset($uploadedImage)): ?>
                <img src="<?php echo $uploadedImage; ?>" alt="Uploaded Image" style="max-width:100%; margin-top:10px;">
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
