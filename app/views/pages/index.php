<?php include 'layouts/header.php'; ?>
<?php
$loginLink =URL_ROOT."/students/login";
$registerLink =URL_ROOT."/students";

?>
<div class="container-fluid quiz-container">
 <div class="quiz-body fixed-height">
     <h1 class="home-header">Quiz System</h1>
     <p class="quiz-msg">Register if you're new Student or Login</p>
     <div class="row m-auto reg-row">
         <a href=<?php echo $registerLink ?> class="col-md-5 col-xs-8 m-3 login-register-btn"> Register &#9997;</a>
         <a href=<?php echo $loginLink ;?> class="col-md-5 col-xs-8 m-3 login-register-btn"> Login &#9997;</a>
     </div>
     <h3 class="good-luck">GOOD LUCK </h3>
     <div class="gradient1"></div>
     <div class="gradient2"></div>
     <div class="gradient3"></div>
 </div>
</div>
<?php include 'layouts/footer.php'; ?>