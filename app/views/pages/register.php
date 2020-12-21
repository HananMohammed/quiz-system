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
                                <?php if(isset($_SESSION["register_errors"])): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>
                                            <ul>
                                             <?php foreach($_SESSION["register_errors"] as $error): ?>
                                                <li><?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                            </ul>
                                        </strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <form method="post" action=<?php echo $action ;?> enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Enter Your Username:</label>
                                        <input type="text" name="name" class="form-control" placeholder="Student Username"  <?php if(isset($_SESSION["old"]["name"])): ?> value=<?php echo $_SESSION["old"]["name"] ; ?> <?php endif; ?>  />
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Student Email"  <?php if(isset($_SESSION["old"]["email"])): ?> value=<?php echo $_SESSION["old"]["email"] ; ?> <?php endif; ?> />
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your Password:</label>
                                        <input type="password" name="password" class="form-control"  placeholder="Password"  <?php if(isset($_SESSION["old"]["password"])): ?> value=<?php echo $_SESSION["old"]["password"] ; ?> <?php endif; ?> />
                                    </div>
                                    <div class="form-group">
                                        <label>Enter Your College Name:</label>
                                        <input type="text" name="college" class="form-control"  placeholder="College Name " <?php if(isset($_SESSION["old"]["college"])): ?> value=<?php echo $_SESSION["old"]["college"] ; ?> <?php endif; ?>  />
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