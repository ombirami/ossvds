<?php
include('includes/db.php');
include('includes/header.php');

// सभी media items निकालें
$stmt = $pdo->query("SELECT * FROM media ORDER BY uploaded_on DESC");
$mediaList = $stmt->fetchAll();
?>

<div class="container mt-4">
    <h2>🎶 अपलोड की गई मीडिया फ़ाइलें</h2>

    <?php if (count($mediaList) === 0): ?>
        <div class="alert alert-warning">कोई फ़ाइल अभी तक अपलोड नहीं की गई है।</div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($mediaList as $media): ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5><?= htmlspecialchars($media['title']) ?></h5>
                            <p><?= nl2br(htmlspecialchars($media['description'])) ?></p>

                            <?php if ($media['type'] === 'audio'): ?>
                                <audio controls style="width: 100%;">
                                    <source src="uploads/<?= $media['file_name'] ?>" type="audio/mpeg">
                                    आपका ब्राउज़र ऑडियो चलाने में असमर्थ है।
                                </audio>
                            <?php elseif ($media['type'] === 'video'): ?>
                                <video controls style="width: 100%;">
                                    <source src="uploads/<?= $media['file_name'] ?>" type="video/mp4">
                                    आपका ब्राउज़र वीडियो चलाने में असमर्थ है।
                                </video>
                            <?php endif; ?>

                            <p class="mt-2 text-muted"><small>🗓️ अपलोड तिथि: <?= date("d-m-Y H:i", strtotime($media['uploaded_on'])) ?></small></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
