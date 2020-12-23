<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
$quiz = get_object_vars($_SESSION["quiz_details_list"]["quiz"][0]);
$questions = $_SESSION["quiz_details_list"]["questions"]["selectedQuestions"];
$back = URL_ROOT."/adminPanel/quizLists";
?>

<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header"> <?php echo $quiz["quiz_title"]?> Quiz Details  </h6>
<!--        <div class="space"></div>-->
        <div class="container" style="z-index: 10;">
            <div class="card ">
                <div class="card-header text-center">
                    <label class="text-primary font-italic font-weight-bold ml-3">Quiz Title :</label> <?php echo $quiz["quiz_title"]?>
                    <label class="text-primary font-italic font-weight-bold ml-3">Mark On Right :</label> <?php echo $quiz["mark_on_right"]?>
                    <label class="text-primary font-italic font-weight-bold ml-3">Minus On Wrong :</label> <?php echo $quiz["minus_on_wrong"]?>
                </div>
                <div class="card-body">
                    <?php foreach ($questions as $question ):?>
                    <?php $question = get_object_vars($question[0]) ; ?>
                    <h5 class="card-title"><?php echo $question ["question"] ;?></h5>

                    <p class="card-text"><label class="text-primary font-weight-bold ml-3 mr-3">Choices :</label>[ <?php echo $question ["choice1"] . " , ". $question ["choice2"]. " , ".$question ["choice3"]. " , ".$question ["choice4"]; ?>]</p>
                    <p class="card-text"><label class="text-primary font-weight-bold ml-3 mr-3">Correct Answer  :</label> <?php echo $question ["correct_answer"]?></p>
                    <hr>
                    <?php endforeach; ?>
                    <a href=<?php echo $back ;?> class="btn btn-primary" style="margin-left: 40%;">Back</a>
                </div>
                <div class="card-footer text-muted">
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
