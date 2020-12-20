<?php
$home =URL_ROOT."/welcome?q=1";
$history =URL_ROOT."/welcome?q=2";
$logout =URL_ROOT."/welcome/logout";

?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href=<?php echo URL_ROOT ;?>>Online Quiz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href=<?php echo $home ;?>>
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=<?php echo $history ;?>>
                    <i class="fa fa-list-alt" aria-hidden="true"></i> History
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