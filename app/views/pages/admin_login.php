<?php
include 'layouts/header.php';
$action = URL_ROOT."/admin/authAdmin";
?>
    <div class="container-fluid quiz-container">
        <div class="quiz-body fixed-height">
            <section class="login first grey">
                <div class="container">
                    <div class="box-wrapper">
                        <div class="box box-border">
                            <div class="box-body">
                                <center> <h5 style="font-family: Noto Sans;">Admin</h5><h4 style="font-family: Noto Sans;">Login</h4></center><br>
                                <?php if(isset($data["success"])): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?php echo $data["success"]; ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($data["error-login"])): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?php echo $data["error-login"]; ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
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