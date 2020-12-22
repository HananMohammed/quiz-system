<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
$action = URL_ROOT."/adminPanel/createQuestion";

?>
<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header">Add Question  </h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="panel">
                        <?php if (isset($_SESSION["success_msg"]["success"])): ?>
                            <div class="alert alert-success alert-dismissible fade show m-auto " role="alert" id="alertSuccess">
                                <strong><?php echo $_SESSION["success_msg"]["success"] ; ?> </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION["questionErrors"])): ?>
                            <div class="alert alert-danger alert-dismissible fade show m-auto" role="alert" id="alertFail">
                                <ul>
                                    <?php foreach($_SESSION["questionErrors"] as $error): ?>
                                        <li> <strong><?php echo $error ?> </strong></li>
                                    <?php endforeach; ?>
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive mt-3">
                            <form method="post" action=<?php echo $action ;?>>
                                <div class="form-group col-md-12">
                                    <label for="question">Question</label>
                                    <input type="text" class="form-control" name="question" id="question" placeholder="Enter question "<?php if(isset( $_SESSION["old-question"]["question"])): ?> value=<?php echo  $_SESSION["old-question"]["question"] ?> <?php endif; ?>>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="choice1">Choice 1 </label>
                                    <input type="text" class="form-control" name="choice1" id="choice1" placeholder="Enter choice 1" <?php if(isset( $_SESSION["old-question"]["choice1"])): ?> value=<?php echo  $_SESSION["old-question"]["choice1"] ?> <?php endif; ?> >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="choice2">Choice 2 </label>
                                    <input type="text"  class="form-control" name="choice2" id="choice2" placeholder="Enter Choice 2" <?php if(isset( $_SESSION["old-question"]["choice2"])): ?> value=<?php echo  $_SESSION["old-question"]["choice2"] ?> <?php endif; ?> >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="choice3">Choice 3</label>
                                    <input type="text" class="form-control" name="choice3" id="choice3" placeholder="Enter Choice 3" <?php if(isset( $_SESSION["old-question"]["choice3"])): ?> value=<?php echo  $_SESSION["old-question"]["choice3"] ?> <?php endif; ?>>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="choice4">Choice 4 </label>
                                    <input type="text" class="form-control" name="choice4" id="choice4" placeholder="Enter Choice 4" <?php if(isset( $_SESSION["old-question"]["choice4"])): ?> value=<?php echo  $_SESSION["old-question"]["choice4"] ?> <?php endif; ?>>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="correct_answer">correct Answer</label>
                                    <select class="form-control" id="correct_answer" name="correct_answer">
                                        <option
                                            <?php if(isset( $_SESSION["old-question"]["correct_answer"])): ?>
                                            value=<?php echo  $_SESSION["old-question"]["correct_answer"] ?>
                                            <?php endif; ?>>
                                            <?php if(isset( $_SESSION["old-question"]["correct_answer"])): ?>
                                            <?php echo  $_SESSION["old-question"]["correct_answer"] ?>
                                            <?php else: ?> Select Correct Answer <?php endif; ?>
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark" style="margin-left: 40%;">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gradient1"></div>
        <div class="gradient2"></div>
        <div class="gradient3"></div>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>
