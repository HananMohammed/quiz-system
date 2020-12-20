<?php


class Welcome extends Controller
{
    private $welcomeModel ;

    /**
     * Welcome constructor.
     */
    public function __construct()
    {
        $this->welcomeModel = $this->model('WelcomeModel') ;
    }
    public function index($data)
    {
        session_start();
        if(isset($_SESSION['email']))
        {
            $this->view('pages/welcome',$data);
        }
        else{
            header("location:".URL_ROOT);
        }

    }
    public function logout()
    {
        session_start();
        if(isset($_SESSION['email']))
        {
            session_destroy();
        }

        header("location:".URL_ROOT);
    }

}