<?php
include('includes/db.php');
include('includes/header.php');

$message = '';

// चुनाव आरंभ या बंद करने की प्रक्रिया
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $position = $_POST['position'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status']; // active/inactive

    // पहले से रिकॉर्ड हो तो अपडेट करें
    $check = $pdo->prepare("SELECT id FROM elections WHERE position = :position");
    $check->execute(['position' => $position]);
    
    if ($check->rowCount() > 0) {
        // अपडेट करें
        $update = $pdo->prepare("UPDATE elections SET start_date = :start, end_date = :end, status = :status WHERE position = :position");
        $update->execute([
            'start' => $start_date,
            'end' => $end_date,
            'status' => $status,
            'position' => $position
        ]);
        $message = "✅ चुनाव जानकारी अपडेट की गई!";
    } else {
        // नया जोड़ें
        $insert = $pdo->prepare("INSERT INTO elections (position, start_date, end_date, status) VALUES (:position, :start, :end, :status)");
        $insert->execute([
            'position' => $position,
            'start' => $start_date,
            'end' => $end_date,
            'status' => $status
        ]);
        $message = "✅ चुनाव जानकारी सेव की गई!";
    }
}

// सभी चुनाव स्थिति दिखाएं
$all = $pdo->query("SELECT * FROM elections ORDER BY start_date DESC")->fetchAll();
?>

<div class="container mt-4">
    <h2>🗳️ चुनाव नियंत्रण पैनल</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" class="border p-3 mb-4">
        <h5>➕ नया चुनाव जोड़ें/अपडेट करें</h5>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>📌 पद</label>
                <select name="position" class="form-control" required>
                    <option value="">चयन करें</option>
                    <option value="ग्राम अध्यक्ष">ग्राम अध्यक्ष</option>
                    <option value="तहसील संयोजक">तहसील संयोजक</option>
                    <option value="जिला संयोजक">जिला संयोजक</option>
                    <option value="राज्य प्रमुख">राज्य प्रमुख</option>
                    <option value="राष्ट्रीय प्रतिनिधि">राष्ट्रीय प्रतिनिधि</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label>🔃 स्थिति</label>
                <select name="status" class="form-control" required>
                    <option value="active">चालू</option>
                    <option value="inactive">बंद</option>
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label>📅 आरंभ तिथि</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="col-md-2 mb-3">
                <label>📅 समाप्ति तिथि</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">सेव</button>
            </div>
        </div>
    </form>

    <h5>📄 सभी चुनाव विवरण</h5>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>पद</th>
                <th>आरंभ</th>
                <th>समाप्ति</th>
                <th>स्थिति</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all as $e): ?>
                <tr>
                    <td><?= htmlspecialchars($e['position']) ?></td>
                    <td><?= $e['start_date'] ?></td>
                    <td><?= $e['end_date'] ?></td>
                    <td><?= $e['status'] == 'active' ? 'चालू' : 'बंद' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('includes/footer.php'); ?>
