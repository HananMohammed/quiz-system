<?php


class AdminPanel extends Controller
{
    private $adminModel ;

    public function __construct()
    {
        $this->adminModel = $this->model("AdminModel");

    }
    /**
     * Return View Of Admin Panel HomePage
     */
    public function index()
    {
        session_start();
        if(isset($_SESSION['logged']))
        {
            $this->view('pages/admin_homepage');
        }else{
            $this->view('pages/admin_login');
        }

    }
    /**
     * Logout Admin
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