<?php
include 'layouts/header.php';
$action = URL_ROOT."/students/authStudent";
$registerLink =URL_ROOT."/students";
?>
<div class="container-fluid quiz-container">
        <div class="quiz-body">
            <section class="login first grey">
                <div class="container">
                    <div class="box-wrapper">
                        <div class="box box-border">
                            <div class="box-body">
                                <center> <h5 style="font-family: Noto Sans;">Login to </h5><h4 style="font-family: Noto Sans;"> Quiz System</h4></center><br>
                                <p class="text-danger"><?php  if(isset($data["error-login"])){ echo $data["error-login"];  } ?></p>
                                <form method="post" action=<?php echo $action ;?> enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Enter Your Email :</label>
                                        <input type="email" name="email" class="form-control" placeholder="Your email "  />
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your Password :</label>
                                        <input type="password" name="password" class="form-control"  placeholder="Password"  />
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-primary btn-block" name="submit">Login</button>
                                    </div>
                                    <div class="form-group text-center">
                                        <span class="text-muted">Don't have account? </span> <a href=<?php echo $registerLink ;?>>Register </a> Here..
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="gradient1"></div>
            <div class="gradient2"></div>
            <div class="gradient3"></div>
        </div>
    </div>
<?php include 'layouts/footer.php'; ?>