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
        isset($_SESSION['logged_admin']) ? $this->view('pages/admin_homepage')
                                         :  $this->view('pages/admin_login');

    }

    /**
     * Return View Of Admin Panel Students List
     */
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
    /**
     * Delete Student
     */
    public function delete()
    {
        $result = $this->adminModel->deleteStudent($_GET["id"]) ;
        $output = ($result == "success") ?  $result :  "fail";
        echo json_encode($output);
    }
    /**
     * Return View Of Admin Panel Quiz Form  View
     */
    public function addQuiz()
    {
        session_start();
        if(isset($_SESSION['logged_admin']))
        {
            if(isset($_SESSION["old-quiz"]) || isset( $_SESSION["quizErrors"])){
                unset($_SESSION['old-quiz']);
                unset($_SESSION['quizErrors']);
            }
            $this->view('pages/admin_add_quiz');

        }else{
            $this->view('pages/admin_login');
        }
    }
    /**
     * Create Quiz
     */
    public function createQuiz()
    {
        session_start();
        if(isset($_SESSION['logged_admin']))
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_SESSION["old-quiz"]) || isset( $_SESSION["quizErrors"])){
                    unset($_SESSION['old-quiz']);
                    unset($_SESSION['quizErrors']);
                }
                $quizErrors = [] ;
                $quiz_title =  $this->test_input($_POST["quiz_title"]);
                $question_numbers = $this->test_input($_POST["question_numbers"]);
                $mark_on_right = $this->test_input($_POST["mark_on_right"]);
                $minus_on_wrong = $this->test_input($_POST["minus_on_wrong"]);

                //Validate Inputs

                !empty($quiz_title) ? $quiz_title = filter_var($quiz_title, FILTER_SANITIZE_STRING)
                    : $quizErrors["quiz_title"] = " Quiz Title is Required";

                !empty($question_numbers) ? $question_numbers = filter_var($question_numbers,FILTER_SANITIZE_NUMBER_INT)
                    : $quizErrors["question_numbers"] = "Total Number Of Questions are Required";

                if($question_numbers > 20){
                    $quizErrors["question_numbers"] = "Total Number Of Questions Can't be More Than 20";
                }

                !empty($mark_on_right) ? $mark_on_right = filter_var($mark_on_right,FILTER_SANITIZE_NUMBER_INT)
                    : $quizErrors["mark_on_right"] = "Marks on correct answer  are Required";

                if($mark_on_right > 5 || $mark_on_right < 1){
                    $quizErrors["mark_on_right"] = "Marks on correct answer Can't be More Than 5 or less than 1";
                }

                !empty($minus_on_wrong) ? $minus_on_wrong = filter_var($minus_on_wrong,FILTER_SANITIZE_NUMBER_INT)
                    : $quizErrors["minus_on_wrong"] = " Marks on Wrong answer are Required";

                if($minus_on_wrong > 5 || $minus_on_wrong < 1){
                    $quizErrors["minus_on_wrong"] = "Marks on Wrong answer Can't be More Than 5 or less than 1";
                }

                //Store After Validate
                if(empty($quizErrors))
                {
                    $success =  $this->adminModel->createQuiz($quiz_title, $question_numbers, $mark_on_right, $minus_on_wrong);
                    $data = [
                        $success => "Quiz Added Successfully . Kindly Start Add Quiz Questions"
                    ];
                    $this->view('pages/admin_add_quiz', $data);
                }else{
                    if(isset($_SESSION["old-quiz"]) || isset( $_SESSION["quizErrors"])){
                        unset($_SESSION['old-quiz']);
                        unset($_SESSION['quizErrors']);
                    }
                    $data= [
                        "quiz_title"=>$quiz_title,
                        "question_numbers"=>$question_numbers,
                        "mark_on_right"=>$mark_on_right,
                        "minus_on_wrong"=>$minus_on_wrong
                    ];
                    $_SESSION["old-quiz"] = $data;
                    $_SESSION["quizErrors"] = $quizErrors;
                    $this->view('pages/admin_add_quiz');
                }
            }

        }else{
            $this->view('pages/admin_login');
        }
    }

    /**
     * Return view to Admin Quiz List
     */
    public function quizLists()
    {
        session_start();
        if(isset($_SESSION['logged_admin']))
        {
            if(isset($_SESSION["quizes"])){
                unset($_SESSION["quizes"]) ;
            }
            $quizes = $this->adminModel->listQuizes();

            $_SESSION["quizes"] = $quizes;

            $this->view('pages/admin_quiz_list');

        }else{
            $this->view('pages/admin_login');
        }
    }

    /**
     * return view of Question Create Form
     */
    public function addQuestion()
    {
        session_start();

        isset($_SESSION['logged_admin']) ? $this->view('pages/admin_create_question')
                                         : $this->view('pages/admin_login');
    }
    public function createQuestion()
    {
        session_start();
        if(isset($_SESSION['logged_admin']))
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(isset($_SESSION["old-question"]) || isset( $_SESSION["questionErrors"])){
                    unset($_SESSION['old-question']);
                    unset($_SESSION['questionErrors']);
                }
                if (isset($_SESSION["success_msg"]) ){
                    unset($_SESSION["success_msg"] );
                }
                $questionErrors = [] ;
                $question =  $this->test_input($_POST["question"]);
                $choice1 = $this->test_input($_POST["choice1"]);
                $choice2 = $this->test_input($_POST["choice2"]);
                $choice3 = $this->test_input($_POST["choice3"]);
                $choice4 = $this->test_input($_POST["choice4"]);
                $correct_answer = $this->test_input($_POST["correct_answer"]);

                //Validate Inputs

                !empty($question) ? $question = filter_var($question, FILTER_SANITIZE_STRING)
                    : $questionErrors["question"] = " Question is Required";

                !empty($choice1) ? $choice1 = filter_var($choice1, FILTER_SANITIZE_STRING)
                    : $questionErrors["choice1"] = " Choice 1 is Required";

                !empty($choice2) ? $choice2 = filter_var($choice2, FILTER_SANITIZE_STRING)
                    : $questionErrors["choice2"] = " Choice 2 is Required";

                !empty($choice3) ? $choice3 = filter_var($choice3, FILTER_SANITIZE_STRING)
                    : $questionErrors["choice3"] = " Choice 3 is Required";

                !empty($choice4) ? $choice4 = filter_var($choice4, FILTER_SANITIZE_STRING)
                    : $questionErrors["choice4"] = " Choice 4 is Required";

                !empty($correct_answer) ? $correct_answer = filter_var($correct_answer, FILTER_SANITIZE_STRING)
                    : $questionErrors["correct_answer"] = "correct answer is Required";
                //Store After Validate
                if(empty($questionErrors))
                {
                    $result  = $this->adminModel->createQuestion($question, $choice1, $choice2, $choice3, $choice4, $correct_answer);
                    if($result == "success"){
                        $data = [
                            $result => "Question Added Successfully....."
                        ];

                        $_SESSION["success_msg"] = $data ;

                        $this->view('pages/admin_create_question');

                    }
                }else{
                    if(isset($_SESSION["old-question"]) || isset( $_SESSION["questionErrors"])){
                        unset($_SESSION['old-question']);
                        unset($_SESSION['questionErrors']);
                    }
                    $data = [
                        "question" => $question,
                        "choice1" => $choice1,
                        "choice2" => $choice2,
                        "choice3" => $choice3,
                        "choice4" => $choice4,
                        "correct_answer" => $correct_answer
                    ];
                    $_SESSION['old-question'] = $data;
                    $_SESSION['questionErrors'] = $questionErrors;
                    $this->view('pages/admin_create_question');
                }


            }


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

    /**
     * Test User Data Inputs
     * @param $data
     * @return string
     */
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}