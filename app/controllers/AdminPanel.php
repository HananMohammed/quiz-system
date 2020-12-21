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
        if(isset($_SESSION['logged_admin']))
        {
            $this->view('pages/admin_homepage');
        }else{
            $this->view('pages/admin_login');
        }

    }
    public function students()
    {
        session_start();
        if(isset($_SESSION['logged_admin']))
        {
            $students = $this->adminModel->listStudents();
            $_SESSION["students"] = $students ;
            $this->view('pages/admin_list_students');

        }else{
            $this->view('pages/admin_login');
        }
    }
    public function delete()
    {
        $result = $this->adminModel->deleteStudent($_GET["id"]) ;
        $output = ($result == "success") ?  $result :  "fail";
        echo json_encode($output);
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