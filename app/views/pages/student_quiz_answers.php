<?php
include 'layouts/header.php';
include 'layouts/includes/navbar.php';
$quiz = get_object_vars($_SESSION["student_quiz_and_answers"]["quiz"][0]);
$questions = $_SESSION["student_quiz_and_answers"]["questions"];
$back = URL_ROOT."/adminPanel/quizLists";
$action = URL_ROOT."/welcome/quizSubmit?id=".$_GET["id"];

?>
<?php //print_r($_SESSION["student_history_answers"][0]->student_correct_answers);?>
<?php //print_r( $_SESSION["student_history_answers"][0]->student_wrong_answers);?>

<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header"> <?php echo $quiz["quiz_title"]?> Quiz Details  </h6>
        <div class="container" style="z-index: 11;">
            <div class="card">
                <div class="card-header text-center">
                    <label class="text-primary font-italic font-weight-bold ml-3">Quiz Title :</label> <?php echo $quiz["quiz_title"]?>
                    <label class="text-primary font-italic font-weight-bold ml-3">Mark On Right :</label> <?php echo $quiz["mark_on_right"]?>
                    <label class="text-primary font-italic font-weight-bold ml-3">Minus On Wrong :</label> <?php echo $quiz["minus_on_wrong"]?>
                </div>
                <div class="card-body">
                    <?php foreach ($questions as $key => $question ):?>
                            <?php $question = get_object_vars($question[0]) ; ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="text-dark font-weight-bold"><?php echo $question ["question"] ;?></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer_question_<?php echo $key;?>[]" id="choice1" value="<?php echo $question ["choice1"] ?>">
                                    <label class="form-check-label" for="choice1">
                                        <?php echo $question ["choice1"] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer_question_<?php echo $key;?>[]" id="choice2" value="<?php echo $question ["choice2"] ?>">
                                    <label class="form-check-label" for="choice2">
                                        <?php echo $question ["choice2"] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer_question_<?php echo $key;?>[]" id="choice3" value="<?php echo $question ["choice3"] ?>">
                                    <label class="form-check-label" for="choice3">
                                        <?php echo $question ["choice3"] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer_question_<?php echo $key;?>[]" id="choice4" value="<?php echo $question ["choice4"] ?>">
                                    <label class="form-check-label" for="choice4">
                                        <?php echo $question ["choice4"] ?>
                                    </label>
                                </div>
                            </div>
                            <small id="emailHelp" class="form-text font-weight-bold text-primary mb-3 col-md-6 col-xs-12">Correct Answer is :  <?php echo $question["correct_answer"];?></small>
                        <hr>
                        <?php endforeach; ?>
                </div>
                <div class="card-footer text-muted font-weight-bold text-center text-success best-luck ">
                    Good Luck
                </div>
            </div>
        </div>
        <div class="gradient1"></div>
        <div class="gradient2"></div>
        <div class="gradient3"></div>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>
