<?php

include_once "../app/helpers/Helpers.php";


class Admin extends Controller
{
    use Helpers;
    private $adminModel ;
    /**
     * Admin constructor.
     */
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel') ;
    }
    /**
     * Return View Of Admin Login Page
     */
    public function index()
    {
        $this->view('pages/admin_login');
    }
    /**
     * Authenticate Users Login
     */
    public function authAdmin()
    {
        session_start();
        if(isset($_SESSION["email"]))
        {
            session_destroy();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $email = $this->test_input($_POST["email"]);
            $password = $this->test_input($_POST["password"]);

            $result = $this->adminModel->auth($email, $password);

            if($result["availability"] == "allowed")
            {
                $_SESSION['logged_admin']=$result["data"]["email"];
                $_SESSION['name']=$result["data"]["name"];
                $_SESSION['id']=$result["data"]["id"];
                $_SESSION['email']=$result["data"]["email"];
                $_SESSION['password']=$result["data"]["password"];
                $location = URL_ROOT."/adminPanel";
                header('location: '.$location);
            }
            else{
                $data = ["error-login"=>'Sorry.. Wrong Admin Email (or) Password'] ;
                $this->view('pages/admin_login',$data);
            }
        }

    }

}