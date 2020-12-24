<?php
include 'layouts/header.php';
include 'layouts/includes/navbar.php';
$start = URL_ROOT."/welcome/questions?id="
?>

<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header"> Start Your Quiz  </h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <?php if(isset($data["success"])):?>
                            <div class="alert alert-success alert-dismissible fade show m-auto " role="alert" style=" width:60%;display: flex;justify-content: center;">
                                <strong><?php echo $data["success"] ;?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="alert alert-success alert-dismissible fade show m-auto " role="alert" id="alertSuccess" style=" width:60%;display: flex;justify-content: center;display: none;">
                            <strong>Quiz Deleted Successfully </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show m-auto" role="alert" id="alertFail"  style="width:60%;display: flex;justify-content: center;display: none;">
                            <strong>Error Happened While Deleting Student </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="col-xs-12 table-responsive mt-3">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-bold text-dark">Q.N.</th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Topic</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Total Questions </b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Total Marks</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Created.At</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Start Quiz</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!isset($_SESSION["quizes"]["empty"])): ?>
                                    <?php foreach ($_SESSION["quizes"] as $quiz):?>
                                        <?php $data = get_object_vars($quiz); $countQuestions = count(json_decode($data["quiz_questions"])); ?>
                                        <tr scope="row">
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["id"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["quiz_title"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo  $countQuestions ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["mark_on_right"] * count(json_decode($data["quiz_questions"])) ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["created_at"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" >
                                                <a href=<?php echo $start.$data["id"]?>>
                                                    <i class="fas fa-keyboard fa-2x"></i>
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
