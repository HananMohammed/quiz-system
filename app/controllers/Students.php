<?php

include_once "../app/helpers/Helpers.php";


class Students extends Controller
{
    use Helpers ;
    private $studentModel ;

    /**
     * Students constructor.
     */
    public function __construct()
    {
        $this->studentModel = $this->model('Student') ;
    }

    /**
     * Return View Of Register Page
     */
    public function index()
    {
        $this->view('pages/register');
    }

    /**
     *  Register New Student
     */
    public function register()
    {
        session_start();
        $errors= [] ;

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name =  $this->test_input($_POST["name"]);
            $email = $this->test_input($_POST["email"]);
            $password = $this->test_input($_POST["password"]);
            $college = $this->test_input($_POST["college"]);


            //Validate Inputs

            !empty($name) ? $name = filter_var($name, FILTER_SANITIZE_STRING)
                          : $errors["name"] = "Username is Required";

            if(!empty($email))
            {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                filter_var($email, FILTER_VALIDATE_EMAIL)  ?  $email = filter_var($email, FILTER_VALIDATE_EMAIL)
                                                                : $errors["email"] = "Email Not Valid";
               !empty($this->studentModel->getEmail($email) )  ? $errors["email"] = "Sorry.. This email is already registered !!"
                                                               : null ;
            }else{
                $errors["email"]="Email Is Required";

            }

            if(!empty($password))
            {
                preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password ) ?
                    $password = password_hash($password, PASSWORD_DEFAULT)
                    : $errors["password"]="Your password is not safe[should include lower,upper,special Character].";

            }else{
                $errors["password"]="password Is Required";
            }

            !empty($college) ? $college = filter_var($college, FILTER_SANITIZE_STRING)
                            : $errors["college"]="college is Required";

            //Store After Validate

            if(empty($errors))
            {
                $success =  $this->studentModel->create($name, $password, $email, $college);
                $data = [
                    $success => "Student Registered Successfully . Kindly Login To Start Quiz"
                ];
                $this->view('pages/login', $data);
            }
            else{
                if(isset($_SESSION["register_errors"]))
                {
                    session_destroy();
                }
                $_SESSION["register_errors"] = $errors ;
                $_SESSION["old"] = [
                    "name" =>$name,
                    "email" => $email,
                    "password" =>$_POST["password"],
                    "college" => $college
                ] ;
                $this->view('pages/register');
            }
        }

    }

    /**
     *  return view of Login page
     */
    public function login()
    {
        $this->view('pages/login');
    }

    /**
     * Authenticate Users Login
     */
    public function authStudent()
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

            $result = $this->studentModel->auth($email, $password);

            if($result["availability"] == "allowed")
            {
                $_SESSION['logged']=$result["data"]["email"];
                $_SESSION['name']=$result["data"]["name"];
                $_SESSION['id']=$result["data"]["id"];
                $_SESSION['email']=$result["data"]["email"];
                $_SESSION['password']=$result["data"]["password"];
                $location = URL_ROOT."/welcome?q=1";
                header('location: '.$location);
            }
            else{
                $data = ["error-login"=>'Sorry.. Wrong Username (or) Password'] ;
                $this->view('pages/login',$data);
            }
        }

    }
}