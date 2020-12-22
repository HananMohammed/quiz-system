<?php
$admin_home =URL_ROOT."/adminPanel";
$students =URL_ROOT."/adminPanel/students";
$scores =URL_ROOT."/adminPanel/scores";
$quiz = URL_ROOT."/adminPanel/quizLists";
$addQuiz = URL_ROOT."/adminPanel/addQuiz";
$addQuestion = URL_ROOT."/adminPanel/addQuestion";
$logout =URL_ROOT."/adminPanel/logout";
?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href=<?php echo $admin_home ;?>>welcome <?php echo $_SESSION["name"]; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href=<?php echo $admin_home ;?>>
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=<?php echo $students ;?>>
                    <i class="far fa-user"></i> Students
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=<?php echo $scores ;?>>
                    <i class="far fa-star"></i> Scores
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=<?php echo $quiz ;?>>
                    <i class="fas fa-align-justify"></i> Quiz Lists
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=<?php echo $addQuiz ;?>>
                    <i class="far fa-file-alt"></i> Add Quiz
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=<?php echo $addQuestion ;?>>
                    <i class="far fa-file-alt"></i> Add Question
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class=" btn btn-outline-primary my-2 my-sm-0" href=<?php echo $logout ;?>>
                <i class="fas fa-sign-out-alt"></i>Logout
            </a>
        </form>
    </div>
</nav>