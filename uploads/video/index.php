<?php
include('../includes/header.php');
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">📽️ वैदिक वीडियो संग्रह</h2>

    <div class="row">
        <!-- प्रवचन वीडियो -->
        <div class="col-md-6 mb-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h5 class="card-title">🗣️ प्रवचन</h5>
                    <iframe width="100%" height="215" src="https://www.youtube.com/embed/VIDEO_ID_1" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- भजन वीडियो -->
        <div class="col-md-6 mb-4">
            <div class="card border-success">
                <div class="card-body">
                    <h5 class="card-title">🎶 भजन-कीर्तन</h5>
                    <iframe width="100%" height="215" src="https://www.youtube.com/embed/VIDEO_ID_2" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- संगठनात्मक गतिविधियाँ -->
        <div class="col-md-6 mb-4">
            <div class="card border-warning">
                <div class="card-body">
                    <h5 class="card-title">🚩 संगठनात्मक गतिविधियाँ</h5>
                    <iframe width="100%" height="215" src="https://www.youtube.com/embed/VIDEO_ID_3" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- सामाजिक जागरण -->
        <div class="col-md-6 mb-4">
            <div class="card border-danger">
                <div class="card-body">
                    <h5 class="card-title">📣 सामाजिक जागरण</h5>
                    <iframe width="100%" height="215" src="https://www.youtube.com/embed/VIDEO_ID_4" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
