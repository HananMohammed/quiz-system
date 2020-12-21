<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
?>
<div class="container-fluid quiz-container">
    <div class="quiz-body fixed-height">
        <h1 class="home-header admin-header">Welcome To Quiz System Dashboard</h1>
        <div class="space"></div>
        <p class=" good-luck"><?php echo $_SESSION["name"]?></p>
        <section class="login first grey">
            <div class="container">

            </div>
        </section>
        <div class="gradient1"></div>
        <div class="gradient2"></div>
        <div class="gradient3"></div>
    </div>
</div>

<?php
include 'layouts/footer.php';
?>
