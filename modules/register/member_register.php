<?php
include('includes/db.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $village = $_POST['village'];
    $tehsil = $_POST['tehsil'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $level = $_POST['level'];

    $sql = "INSERT INTO members (name, gender, mobile, email, dob, village, tehsil, district, state, level, registered_on) 
            VALUES (:name, :gender, :mobile, :email, :dob, :village, :tehsil, :district, :state, :level, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'gender' => $gender,
        'mobile' => $mobile,
        'email' => $email,
        'dob' => $dob,
        'village' => $village,
        'tehsil' => $tehsil,
        'district' => $district,
        'state' => $state,
        'level' => $level
    ]);

    $message = "✅ सदस्य सफलतापूर्वक पंजीकृत हो गया!";
}
?>

<?php include('includes/header.php'); ?>

<div class="container mt-4">
    <h2>📝 सदस्य पंजीकरण</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>👤 पूरा नाम</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>⚤ लिंग</label>
                <select name="gender" class="form-control" required>
                    <option value="">-- चयन करें --</option>
                    <option value="पुरुष">पुरुष</option>
                    <option value="महिला">महिला</option>
                    <option value="अन्य">अन्य</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>📞 मोबाइल</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>✉️ ईमेल</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>🎂 जन्म तिथि</label>
                <input type="date" name="dob" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>🏠 ग्राम</label>
                <input type="text" name="village" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>🏢 तहसील</label>
                <input type="text" name="tehsil" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>🏛 जिला</label>
                <input type="text" name="district" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>🗺 राज्य</label>
                <input type="text" name="state" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>🌐 स्तर</label>
                <select name="level" class="form-control" required>
                    <option value="">-- चयन करें --</option>
                    <option value="village">ग्राम</option>
                    <option value="tehsil">तहसील</option>
                    <option value="district">जिला</option>
                    <option value="state">राज्य</option>
                    <option value="center">केन्द्र</option>
                </select>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">सदस्य जोड़ें</button>
            </div>
        </div>
    </form>
</div>

<?php include('includes/footer.php'); ?>
