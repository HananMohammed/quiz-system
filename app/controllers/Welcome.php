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

    /**
     * direct Student to welcome Page if Authenticated
     * @param $data
     */
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

    /**
     * Logout Student
     */
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