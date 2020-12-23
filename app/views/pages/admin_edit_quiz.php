<?php
isset($data["quiz"][0])?$inputs = get_object_vars($data["quiz"][0]):$inputs=$_SESSION["old-edit-quiz"];
isset($_SESSION["old-edit-quiz"]) ? $data = $_SESSION["old-edit-quiz"]:null;
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
$action = URL_ROOT."/adminPanel/updateQuiz?id=". $_GET["id"];
?>
<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header">Edit Quiz </h6>
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
                        <?php if (!empty($_SESSION["quiz-edit-Errors"])): ?>
                            <div class="alert alert-danger alert-dismissible fade show m-auto" role="alert" id="alertFail">
                                <ul>
                                    <?php foreach($_SESSION["quiz-edit-Errors"] as $error): ?>
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
                                    <input type="text" class="form-control" name="quiz_title" id="title" placeholder="Enter Quiz Title "value="<?php echo $inputs["quiz_title"] ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="markRight">Marks on correct answer </label>
                                    <input type="number" maxlength="5" class="form-control" name="mark_on_right" id="markRight" placeholder="Enter Marks on correct answer "  value="<?php echo  $inputs["mark_on_right"] ?>" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="markMinus">Minus on Wrong answer </label>
                                    <input type="number" maxlength="5" class="form-control" name="minus_on_wrong" id="markMinus" placeholder="Enter Minus Marks on wrong answer"value="<?php echo  $inputs["minus_on_wrong"] ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="totalQuestions">Kindly Select Quiz Related Questions  (Questions Shouldn't be less than 10 or more than 30)</label>
                                    <select id="totalQuestions" name="quiz_questions[]" class="form-control" multiple="multiple">
                                        <?php foreach ($data["quizRelatedQuestions"]["all_Questions"]as $allQuestions):?>
                                            <?php $notSelectedData = get_object_vars($allQuestions) ;?>

                                            <?php foreach ($data["quizRelatedQuestions"]["selectedQuestions"]as $selectedQuestion):?>
                                                <?php $selectedQues = get_object_vars($selectedQuestion[0]) ;?>
                                            <?php if($notSelectedData["id"] !=$selectedQues["id"]):?>
                                                <option value="<?php echo $notSelectedData["id"]?>"><?php echo $notSelectedData["question"]?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        <?php foreach ($data["quizRelatedQuestions"]["selectedQuestions"]as $selectedQuestion):?>
                                            <?php $data = get_object_vars($selectedQuestion[0]) ;?>
                                            <option value="<?php echo $data["id"]?>" selected="selected"><?php echo $data["question"]?></option>
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
