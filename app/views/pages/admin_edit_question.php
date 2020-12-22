<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
$data = get_object_vars($_SESSION["questionData"][0] );
$action = URL_ROOT."/adminPanel/updateQuestion/id=".$data["id"];

?>
<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header">Edit Question  </h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="panel">
                        <?php if (!empty($_SESSION["success_msg"]["success"])): ?>
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
                                <input type="hidden" class="form-control" name="id" id="id" value='<?php echo  $data["id"]; ?>' hidden>
                                <div class="form-group col-md-12">
                                    <label for="editQuestion">Question</label>
                                    <input type="text" class="form-control" name="question" id="editQuestion" placeholder="Enter question " value='<?php echo  $data["question"]; ?>'>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="editChoice1">Choice 1 </label>
                                    <input type="text" class="form-control" name="choice1" id="editChoice1" placeholder="Enter choice 1" value='<?php echo $data["choice1"] ; ?>'>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="editChoice2">Choice 2 </label>
                                    <input type="text"  class="form-control" name="choice2" id="editChoice2" placeholder="Enter Choice 2" value='<?php echo  $data["choice2"] ; ?>' >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="editChoice3">Choice 3</label>
                                    <input type="text" class="form-control" name="choice3" id="editChoice3" placeholder="Enter Choice 3" value='<?php echo  $data["choice3"]; ?>'>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="editChoice4">Choice 4 </label>
                                    <input type="text" class="form-control" name="choice4" id="editChoice4" placeholder="Enter Choice 4" value="<?php echo $data['choice4'] ; ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="edit_correct_answer">correct Answer</label>
                                    <select class="form-control" id="edit_correct_answer" name="correct_answer">
                                        <option selected><?php echo $data["correct_answer"]?></option>
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
