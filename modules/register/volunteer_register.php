<?php
include('includes/db.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name       = $_POST['name'];
    $gender     = $_POST['gender'];
    $mobile     = $_POST['mobile'];
    $email      = $_POST['email'];
    $skills     = $_POST['skills'];
    $available  = $_POST['available'];
    $address    = $_POST['address'];
    $state      = $_POST['state'];
    $district   = $_POST['district'];
    $tehsil     = $_POST['tehsil'];
    $village    = $_POST['village'];

    $sql = "INSERT INTO volunteers (name, gender, mobile, email, skills, available, address, state, district, tehsil, village, registered_on) 
            VALUES (:name, :gender, :mobile, :email, :skills, :available, :address, :state, :district, :tehsil, :village, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name'      => $name,
        'gender'    => $gender,
        'mobile'    => $mobile,
        'email'     => $email,
        'skills'    => $skills,
        'available' => $available,
        'address'   => $address,
        'state'     => $state,
        'district'  => $district,
        'tehsil'    => $tehsil,
        'village'   => $village
    ]);

    $message = "✅ सेवक सफलतापूर्वक पंजीकृत हो गया!";
}
?>

<?php include('includes/header.php'); ?>

<div class="container mt-4">
    <h2>🙏 स्वयंसेवक पंजीकरण</h2>

    <?php if ($message): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>👤 नाम</label>
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
                <label>💼 विशेष योग्यता / सेवा</label>
                <input type="text" name="skills" class="form-control" placeholder="जैसे: शिक्षण, प्रचार, डिज़ाइन, लेखन" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>🕒 सेवा देने का समय</label>
                <input type="text" name="available" class="form-control" placeholder="जैसे: सप्ताहांत, प्रतिदिन शाम, पूर्णकालिक">
            </div>

            <div class="col-md-12 mb-3">
                <label>🏠 पता</label>
                <textarea name="address" class="form-control" rows="2"></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>🏡 ग्राम</label>
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

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">पंजीकरण करें</button>
            </div>
        </div>
    </form>
</div>

<?php include('includes/footer.php'); ?>
