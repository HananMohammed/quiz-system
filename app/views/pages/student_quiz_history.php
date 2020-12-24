<?php
include 'layouts/header.php';
include 'layouts/includes/navbar.php';
$start = URL_ROOT."/welcome/quizAnswers?id="
?>

<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header"> Your Submitted Quizes  </h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="col-xs-12 table-responsive mt-3">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-bold text-dark">Q.N.</th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Quiz Topic</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Total Questions </b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Total Marks</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Student Marks</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Status</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Submitted.At</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>View Your Answers </b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!isset($_SESSION["student_history"]["empty"])): ?>
                                    <?php foreach ($_SESSION["student_history"] as $quiz):?>
                                        <?php $data = get_object_vars($quiz); ?>
                                        <tr scope="row">
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["id"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["quiz_title"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo  count(json_decode($data["student_correct_answers"])) + count(json_decode($data["student_wrong_answers"])); ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["quiz_rank"] ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["student_result"] ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["status"] ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["created_at"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" >
                                                <a href=<?php echo $start.$data["quiz_id"]."&rank=".$data["id"]?>>
                                                    <i class="far fa-question-circle fa-2x"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
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
