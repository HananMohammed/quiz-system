<?php
include 'layouts/header.php';
include 'layouts/includes/navbar.php';
$start = URL_ROOT."/welcome/questions?id="
?>

<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header text-center"><?php if($_SESSION["student_final_result"]["status"] == "success"):?> Congratulations You Pass The Quiz<?php else: ?> Sorry you don't pass The Quiz <?php endif;?></h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <h3 class=" font-weight-bold text-center"> Take a Look To Your Results </h3>
                        <table class="table table-striped title1" style="font-size:20px;font-weight:1000;">
                            <tbody>
                                <tr style="color:#236c91">
                                    <td>
                                        Total Questions&nbsp;
                                        <i class="far fa-question-circle"></i>
                                    </td>
                                    <td><?php echo $_SESSION["student_final_result"]["totalQuestions"] ;?></td>
                                </tr>
                                <tr style="color:#4e6d10">
                                    <td>
                                        right Answer&nbsp;
                                        <i class="far fa-check-circle"></i>
                                    </td>
                                    <td><?php echo $_SESSION["student_final_result"]["right_answer"] ;?></td>
                                </tr>
                                <tr style="color:#ff0000">
                                    <td>
                                        Wrong Answer&nbsp;
                                        <i class="far fa-times-circle"></i>
                                    </td>
                                    <td><?php echo $_SESSION["student_final_result"]["wrong_answer"] ;?></td>
                                </tr>
                                <tr style="color:#990000">
                                    <td>Overall Score&nbsp;
                                        <i class="far fa-star"></i>
                                    </td>
                                    <td><?php echo $_SESSION["student_final_result"]["over_all_score"] ;?></td>
                                </tr>
                            </tbody>
                        </table>
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

