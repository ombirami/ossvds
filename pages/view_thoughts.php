<?php
include('includes/db.php');
include('includes/header.php');

// विचार डेटा प्राप्त करें
$sql = "SELECT id, title, content, posted_by, posted_on FROM thoughts ORDER BY posted_on DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$thoughts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>🧠 प्रेरणादायक विचार संग्रह</h2>

    <?php if (count($thoughts) > 0): ?>
        <?php foreach ($thoughts as $thought): ?>
            <div class="thought-block" style="background: #f5f5f5; padding: 15px; margin-bottom: 20px; border-left: 5px solid #ff6600;">
                <h4 style="color: #cc3300;"><?= htmlspecialchars($thought['title']) ?></h4>
                <p style="font-size: 16px;"><?= nl2br(htmlspecialchars($thought['content'])) ?></p>
                <p style="font-size: 14px; color: #555;">
                    ✍️ <?= htmlspecialchars($thought['posted_by']) ?> | 📅 <?= date('d-m-Y', strtotime($thought['posted_on'])) ?>
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>❗ अभी तक कोई विचार पोस्ट नहीं किया गया है।</p>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
