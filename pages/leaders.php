<?php
include('includes/db.php');
include('includes/header.php');

// सभी पदाधिकारियों की सूची लाएं
$sql = "SELECT id, name, position, level, state, district, tehsil, village, mobile, email 
        FROM leaders 
        ORDER BY level ASC, state ASC, district ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$leaders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>🚩 संगठन के प्रमुख पदाधिकारी</h2>

    <?php if (count($leaders) > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #ffe7b2;">
                <tr>
                    <th>क्रम</th>
                    <th>नाम</th>
                    <th>पद</th>
                    <th>स्तर</th>
                    <th>ग्राम</th>
                    <th>तहसील</th>
                    <th>जिला</th>
                    <th>राज्य</th>
                    <th>मोबाइल</th>
                    <th>ईमेल</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leaders as $index => $leader): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($leader['name']) ?></td>
                        <td><?= htmlspecialchars($leader['position']) ?></td>
                        <td><?= ucfirst(htmlspecialchars($leader['level'])) ?></td>
                        <td><?= htmlspecialchars($leader['village']) ?></td>
                        <td><?= htmlspecialchars($leader['tehsil']) ?></td>
                        <td><?= htmlspecialchars($leader['district']) ?></td>
                        <td><?= htmlspecialchars($leader['state']) ?></td>
                        <td><?= htmlspecialchars($leader['mobile']) ?></td>
                        <td><?= htmlspecialchars($leader['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>❗ अभी तक कोई पदाधिकारी पंजीकृत नहीं किया गया है।</p>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
