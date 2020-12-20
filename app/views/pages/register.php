<?php
include 'layouts/header.php';
$action = URL_ROOT."/students/register";
$loginLink =URL_ROOT."/students/login";
?>

    <div class="container-fluid quiz-container">
        <div class="quiz-body">
            <section class="login first grey">
                <div class="container">
                    <div class="box-wrapper">
                        <div class="box box-border">
                            <div class="box-body">
                                <center> <h5 style="font-family: Noto Sans;">Register to </h5><h4 style="font-family: Noto Sans;"> Quiz System</h4></center><br>
                                <form method="post" action=<?php echo $action ;?> enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Enter Your Username:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Student Username"  />
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Student Email"  />
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your Password:</label>
                                        <input type="password" name="password" class="form-control"  placeholder="Password"  />
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your College Name:</label>
                                        <input type="text" name="college" class="form-control"  placeholder="College Name "  />
                                    </div>

                                    <div class="form-group text-right">
                                        <button class="btn btn-primary btn-block" name="submit">Register</button>
                                    </div>
                                    <div class="form-group text-center">
                                        <span class="text-muted">Already have an account! </span> <a href=<?php echo $loginLink ;?>>Login </a> Here..
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