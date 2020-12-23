<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
$delete = URL_ROOT."/adminPanel/deleteQuestion?id=";
$edit = URL_ROOT."/adminPanel/editQuestion?id=";
?>

<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header"> Question Lists </h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <?php if(isset($data["success"])): ?>
                            <div class="alert alert-success alert-dismissible fade show m-auto " role="alert" id="alertSuccess" style=" width:60%;display: flex;justify-content: center;">
                                <strong><?php echo $data["success"]; ?> </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif ;?>

                        <div class="alert alert-success alert-dismissible fade show m-auto " role="alert" id="alertSuccess" style=" width:60%;display: flex;justify-content: center;display: none;">
                            <strong>Question Deleted Successfully </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show m-auto" role="alert" id="alertFail"  style="width:60%;display: flex;justify-content: center;display: none;">
                            <strong>Error Happened While Deleting Question </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class=" col-xs-12 table-responsive mt-3">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-bold text-dark">Q.N.</th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Question</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Choice 1</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Choice 2</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Choice 3</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Choice 4</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Correct Choice</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Created.At</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Actions</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!isset($_SESSION["questions"]["empty"])): ?>
                                    <?php foreach ($_SESSION["questions"] as $question):?>
                                        <?php $data = get_object_vars($question) ;?>
                                        <tr scope="row">
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["id"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["question"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["choice1"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["choice2"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["choice3"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["choice4"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["correct_answer"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" ><?php echo $data["created_at"] ; ?></td>
                                            <td class="text-dark font-italic font-weight-bold" >
                                                <a href=<?php echo $delete.$data["id"] ?> class="deleteQuestion">
                                                    <i class="fas fa-trash-alt ml-2"></i>
                                                </a>
                                                <a href=<?php echo $edit.$data["id"] ?>>
                                                    <i class="far fa-edit ml-2"></i>
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
