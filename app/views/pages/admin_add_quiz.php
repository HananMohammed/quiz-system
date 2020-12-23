<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
$action = URL_ROOT."/adminPanel/createQuiz";
?>
<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header">Add Quiz </h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="panel">
                        <?php if (isset($data["success"])): ?>
                        <div class="alert alert-success alert-dismissible fade show m-auto " role="alert" id="alertSuccess">
                            <strong><?php echo $data["success"] ; ?> </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION["quizErrors"])): ?>
                        <div class="alert alert-danger alert-dismissible fade show m-auto" role="alert" id="alertFail">
                            <ul>
                                <?php foreach($_SESSION["quizErrors"] as $error): ?>
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
                                    <label for="title">Quiz Title</label>
                                    <input type="text" class="form-control" name="quiz_title" id="title" placeholder="Enter Quiz Title "<?php if(isset( $_SESSION["old-quiz"]["quiz_title"])): ?> value=<?php echo  $_SESSION["old-quiz"]["quiz_title"] ?> <?php endif; ?>>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="markRight">Marks on correct answer </label>
                                    <input type="number" maxlength="5" class="form-control" name="mark_on_right" id="markRight" placeholder="Enter Marks on correct answer " <?php if(isset( $_SESSION["old-quiz"]["mark_on_right"])): ?> value=<?php echo  $_SESSION["old-quiz"]["mark_on_right"] ?> <?php endif; ?> >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="markMinus">Minus on Wrong answer </label>
                                    <input type="number" maxlength="5" class="form-control" name="minus_on_wrong" id="markMinus" placeholder="Enter Minus Marks on wrong answer" <?php if(isset( $_SESSION["old-quiz"]["minus_on_wrong"])): ?> value=<?php echo  $_SESSION["old-quiz"]["minus_on_wrong"] ?> <?php endif; ?>>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="totalQuestions">Kindly Select Quiz Related Questions  (Questions Shouldn't be less than 10 or more than 30)</label>
                                    <select id="totalQuestions" name="quiz_questions[]" class="form-control" multiple="multiple">
                                        <?php foreach ($_SESSION["all_quiz_questions"] as $question):?>
                                        <?php $data = get_object_vars($question) ;?>
                                        <option value="<?php echo $data["id"]?>"><?php echo $data["question"]?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark" style="margin-left: 40%;">Submit</button>
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
