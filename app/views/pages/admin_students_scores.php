<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
?>

<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header text-center">Students Scores</h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class=" col-xs-12 table-responsive mt-3">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-bold text-dark">Q.N.</th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Quiz Title</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Student Email </b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Quiz Score</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Student Score</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Status</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Submitted.At</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!isset($_SESSION["all_Students_Scores"]["empty"])): ?>
                                    <?php foreach ($_SESSION["all_Students_Scores"] as $question):?>
                                        <?php $data = get_object_vars($question) ;?>
                                        <tr scope="row">
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["id"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["quiz_title"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["student_email"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["quiz_rank"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["student_result"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["status"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["created_at"] ; ?></td>
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

