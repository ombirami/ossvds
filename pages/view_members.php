<?php
include('includes/db.php');
include('includes/header.php');

// सदस्य डेटा प्राप्त करें
$sql = "SELECT id, name, gender, age, mobile, email, village, tehsil, district, state FROM members ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>📋 पंजीकृत सदस्य सूची</h2>

    <?php if (count($members) > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead style="background: #ffeed0;">
                <tr>
                    <th>क्रम</th>
                    <th>नाम</th>
                    <th>लिंग</th>
                    <th>आयु</th>
                    <th>मोबाइल</th>
                    <th>ईमेल</th>
                    <th>ग्राम</th>
                    <th>तहसील</th>
                    <th>जिला</th>
                    <th>राज्य</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $index => $member): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($member['name']) ?></td>
                        <td><?= htmlspecialchars($member['gender']) ?></td>
                        <td><?= htmlspecialchars($member['age']) ?></td>
                        <td><?= htmlspecialchars($member['mobile']) ?></td>
                        <td><?= htmlspecialchars($member['email']) ?></td>
                        <td><?= htmlspecialchars($member['village']) ?></td>
                        <td><?= htmlspecialchars($member['tehsil']) ?></td>
                        <td><?= htmlspecialchars($member['district']) ?></td>
                        <td><?= htmlspecialchars($member['state']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>❗ अभी तक कोई सदस्य पंजीकृत नहीं हुआ है।</p>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
