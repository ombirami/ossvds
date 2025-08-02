<?php
include("includes/db.php");
include("includes/header.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mandal_name = trim($_POST["mandal_name"]);
    $tehsil_id = $_POST["tehsil_id"];

    if (!empty($mandal_name) && !empty($tehsil_id)) {
        $stmt = $conn->prepare("INSERT INTO mandals (name, tehsil_id) VALUES (?, ?)");
        $stmt->bind_param("si", $mandal_name, $tehsil_id);

        if ($stmt->execute()) {
            $message = "✅ मंडल सफलतापूर्वक जोड़ा गया!";
        } else {
            $message = "❌ त्रुटि: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "❗ कृपया सभी फ़ील्ड भरें।";
    }
}

// Fetch tehsils for dropdown
$tehsils = [];
$result = $conn->query("SELECT id, name FROM tehsils ORDER BY name ASC");
while ($row = $result->fetch_assoc()) {
    $tehsils[] = $row;
}
?>

<div class="container mt-5">
    <h2>➕ नया मंडल जोड़ें</h2>

    <?php if ($message): ?>
        <div class="alert alert-info mt-3"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>मंडल का नाम:</label>
            <input type="text" name="mandal_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>तहसील चुनें:</label>
            <select name="tehsil_id" class="form-control" required>
                <option value="">-- तहसील चयन करें --</option>
                <?php foreach ($tehsils as $tehsil): ?>
                    <option value="<?php echo $tehsil['id']; ?>"><?php echo $tehsil['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">मंडल जोड़ें</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>
