<?php
include 'layouts/header.php';
include 'layouts/includes/admin-navbar.php';
$delete = URL_ROOT."/adminPanel/delete?id="
?>
<div class="container-fluid quiz-container">
    <div class="quiz-body">
        <h6 class="students-header">Students</h6>
        <div class="space"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="alert alert-success alert-dismissible fade show m-auto " role="alert" id="alertSuccess" style=" width:60%;display: flex;justify-content: center;display: none;">
                            <strong>Student Deleted Successfully </strong>
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
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-bold text-dark">S.N.</th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Name</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>College</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Email</b></th>
                                    <th scope="col" class="font-weight-bold text-dark"><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!isset($_SESSION["students"]["empty"])): ?>
                                <?php foreach ($_SESSION["students"] as $student):?>
                                        <?php $data = get_object_vars($student) ;?>
                                    <tr scope="row">
                                        <td class="text-dark font-italic font-weight-bold" ><?php echo $data["id"] ; ?></td>
                                        <td class="text-dark font-italic font-weight-bold" ><?php echo $data["name"] ; ?></td>
                                        <td class="text-dark font-italic font-weight-bold" ><?php echo $data["email"] ; ?></td>
                                        <td class="text-dark font-italic font-weight-bold" ><?php echo $data["college"] ; ?></td>
                                        <td class="text-dark font-italic font-weight-bold" >
                                            <a href=<?php echo $delete.$data["id"] ?> class="deleteStudent">
                                                <i class="fas fa-trash-alt"></i>
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
