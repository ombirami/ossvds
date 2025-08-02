<?php
include('includes/db.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name       = $_POST['name'];
    $mobile     = $_POST['mobile'];
    $email      = $_POST['email'];
    $amount     = $_POST['amount'];
    $mode       = $_POST['mode'];
    $date       = $_POST['date'];
    $purpose    = $_POST['purpose'];

    $sql = "INSERT INTO donations (name, mobile, email, amount, mode, date, purpose, submitted_on)
            VALUES (:name, :mobile, :email, :amount, :mode, :date, :purpose, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name'      => $name,
        'mobile'    => $mobile,
        'email'     => $email,
        'amount'    => $amount,
        'mode'      => $mode,
        'date'      => $date,
        'purpose'   => $purpose
    ]);

    $message = "✅ धन्यवाद! आपका दान सुरक्षित रूप से दर्ज कर लिया गया है।";
}
?>

<?php include('includes/header.php'); ?>

<div class="container mt-4">
    <h2>💰 दान फॉर्म</h2>

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
                <label>📞 मोबाइल</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>✉️ ईमेल</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label>💵 राशि (₹)</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>💳 भुगतान माध्यम</label>
                <select name="mode" class="form-control" required>
                    <option value="">-- चयन करें --</option>
                    <option value="UPI">UPI</option>
                    <option value="Bank Transfer">बैंक ट्रांसफर</option>
                    <option value="Cash">नकद</option>
                    <option value="Cheque">चेक</option>
                    <option value="Other">अन्य</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>📅 भुगतान की तिथि</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="col-md-12 mb-3">
                <label>🎯 दान का उद्देश्य</label>
                <input type="text" name="purpose" class="form-control" placeholder="जैसे: गौसेवा, मंदिर निर्माण, संगठन विस्तार" required>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">✅ दान दर्ज करें</button>
            </div>
        </div>
    </form>
</div>

<?php include('includes/footer.php'); ?>
