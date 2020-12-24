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
            $questions = $this->adminModel->listquestions();
            $_SESSION["all_quiz_questions"] = $questions  ;
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
                $mark_on_right = $this->test_input($_POST["mark_on_right"]);
                $minus_on_wrong = $this->test_input($_POST["minus_on_wrong"]);
                $quiz_questions = $_POST["quiz_questions"];

                //Validate Inputs

                !empty($quiz_title) ? $quiz_title = filter_var($quiz_title, FILTER_SANITIZE_STRING)
                    : $quizErrors["quiz_title"] = " Quiz Title is Required";

                !empty($mark_on_right) ? $mark_on_right = filter_var($mark_on_right,FILTER_SANITIZE_NUMBER_INT)
                    : $quizErrors["mark_on_right"] = "Marks on correct answer  are Required";

                if($mark_on_right > 5 || $mark_on_right < 1){
                    $quizErrors["mark_on_right"] = "Marks on correct answer Can't be More Than 5 or less than 1";
                }

                !empty($minus_on_wrong) ? $minus_on_wrong = filter_var($minus_on_wrong,FILTER_SANITIZE_NUMBER_INT)
                    : $quizErrors["minus_on_wrong"] = " Marks on Wrong answer are Required";

                !empty($quiz_questions) ? $quiz_questions = filter_var_array($quiz_questions,FILTER_VALIDATE_INT)
                    : $quizErrors["quiz_questions"] = "It is required to select at least 10 question for each quiz";

                if($minus_on_wrong > 5 || $minus_on_wrong < 1){
                    $quizErrors["minus_on_wrong"] = "Marks on Wrong answer Can't be More Than 5 or less than 1";
                }
                if(count($quiz_questions) > 30 || count($quiz_questions) < 10){
                    $quizErrors["quiz_questions"] = "Number Of Questions can't be less than 10 or more than 30";
                }

                //Store After Validate
                if(empty($quizErrors))
                {
                    $success =  $this->adminModel->createQuiz($quiz_title, $mark_on_right, $minus_on_wrong,json_encode($quiz_questions));
                    $data = [
                        $success => "Quiz Added Successfully "
                    ];
                    $this->view('pages/admin_add_quiz',$data);
                }else{
                    if(isset($_SESSION["old-quiz"]) || isset( $_SESSION["quizErrors"])){
                        unset($_SESSION['old-quiz']);
                        unset($_SESSION['quizErrors']);
                    }
                    $data= [
                        "quiz_title"=>$quiz_title,
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
            if(isset($_SESSION["quizes"]) || isset($_SESSION["quiz_question"])){
                unset($_SESSION["quizes"]) ;
                unset($_SESSION["quiz_question"]);
            }
            if (isset($_SESSION["quiz_details_list"] )){
                unset($_SESSION["quiz_details_list"] );
            }
            $quizes = $this->adminModel->listQuizes();

            $_SESSION["quizes"] = $quizes;

            $this->view('pages/admin_quiz_list');

        }else{
            $this->view('pages/admin_login');
        }
    }
    /**
     * Return view to Quiz Edit and generate Quiz Data
     */
    public function editQuiz()
    {
        session_start();
        if(isset($_SESSION['logged_admin']))
        {
            $id = $_GET["id"];
            $quiz = $this->adminModel->editQuiz($id);
            $quizQuestionsId = json_decode(get_object_vars($quiz[0])["quiz_questions"]);
            $quizRelatedQuestions = $this->adminModel->quizRelatedQuestions($quizQuestionsId);
            $data = [
                "quiz" => $quiz,
                "quizRelatedQuestions" => $quizRelatedQuestions,
            ];

            $this->view('pages/admin_edit_quiz',$data);

        }else{
            $this->view('pages/admin_login');
        }
    }
    /**
     * Functionality of Quiz Update
     */
    public function updateQuiz()
    {   session_start();
        if(isset($_SESSION['logged_admin']))
        {
            if (isset($_SERVER["REQUEST_METHOD"]) == "POST")
            {
                $quizErrors = [] ;

                $quiz_title =  $this->test_input($_POST["quiz_title"]);
                $mark_on_right = $this->test_input($_POST["mark_on_right"]);
                $minus_on_wrong = $this->test_input($_POST["minus_on_wrong"]);
                $quiz_questions = $_POST["quiz_questions"];

                //Validate Inputs

                !empty($quiz_title) ? $quiz_title = filter_var($quiz_title, FILTER_SANITIZE_STRING)
                    : $quizErrors["quiz_title"] = " Quiz Title is Required";

                !empty($mark_on_right) ? $mark_on_right = filter_var($mark_on_right,FILTER_SANITIZE_NUMBER_INT)
                    : $quizErrors["mark_on_right"] = "Marks on correct answer  are Required";

                if($mark_on_right > 5 || $mark_on_right < 1){
                    $quizErrors["mark_on_right"] = "Marks on correct answer Can't be More Than 5 or less than 1";
                }

                !empty($minus_on_wrong) ? $minus_on_wrong = filter_var($minus_on_wrong,FILTER_SANITIZE_NUMBER_INT)
                    : $quizErrors["minus_on_wrong"] = " Marks on Wrong answer are Required";

                !empty($quiz_questions) ? $quiz_questions = filter_var_array($quiz_questions,FILTER_VALIDATE_INT)
                    : $quizErrors["quiz_questions"] = "It is required to select at least 10 question for each quiz";

                if($minus_on_wrong > 5 || $minus_on_wrong < 1){
                    $quizErrors["minus_on_wrong"] = "Marks on Wrong answer Can't be More Than 5 or less than 1";
                }
                if(count($quiz_questions) > 30 || count($quiz_questions) < 10){
                    $quizErrors["quiz_questions"] = "Number Of Questions can't be less than 10 or more than 30";
                }
                //Store After Validate
                if(empty($quizErrors))
                {
                    $success =  $this->adminModel->updateQuiz($_GET["id"],$quiz_title, $mark_on_right, $minus_on_wrong,json_encode($quiz_questions));
                    $data = [
                        $success => "Quiz Updated Successfully "
                    ];
                    $this->view('pages/admin_quiz_list',$data);
                }else{
                    if(isset($_SESSION["old-edit-quiz"]) || isset( $_SESSION["quiz-edit-Errors"])){
                        unset($_SESSION['old-edit-quiz']);
                        unset($_SESSION['quiz-edit-Errors']);
                    }
                    $quiz = $this->adminModel->editQuiz($_GET["id"]);
                    $quizQuestionsId = json_decode(get_object_vars($quiz[0])["quiz_questions"]);
                    $questions = $this->adminModel->quizRelatedQuestions($quizQuestionsId);
                    $data= [
                        "quiz_title"=>$quiz_title,
                        "mark_on_right"=>$mark_on_right,
                        "minus_on_wrong"=>$minus_on_wrong,
                        "quizRelatedQuestions"=>$questions
                    ];
                    $_SESSION["old-edit-quiz"] = $data;
                    $_SESSION["quiz-edit-Errors"] = $quizErrors;
                    $this->view('pages/admin_edit_quiz');
                }
            }

        }

    }
    /**
     * Delete Quiz
     */
    public function deleteQuiz()
    {
        $id = $_GET["id"];
        $result = $this->adminModel->deleteQuiz($id);
        $output = ($result == "success") ?  $result :  "fail";
        echo json_encode($output);
    }
    /**
     * return view of Question Create Form
     */
    public function addQuestion()
    {
        session_start();

        if(isset($_SESSION["old-question"]) || isset( $_SESSION["questionErrors"])){
            unset($_SESSION['old-question']);
            unset($_SESSION['questionErrors']);
        }
        if (isset($_SESSION["success_msg"]) ){
            unset($_SESSION["success_msg"] );
        }
        isset($_SESSION['logged_admin']) ? $this->view('pages/admin_create_question')
                                         : $this->view('pages/admin_login');

    }
    /**
     * Create Question
     */
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
     *Questions List
     */
    public function listQuestion()
    {
        session_start();
        if(isset($_SESSION['logged_admin']))
        {
            if(isset($_SESSION["questions"]) || isset($_SESSION["success_msg"])){
                unset($_SESSION["questions"]);
                unset($_SESSION["success_msg"]);
            }
            $questions = $this->adminModel->listquestions();

            $_SESSION["questions"] = $questions;

            $this->view('pages/admin_list_questions');

        }else{
            $this->view('pages/admin_login');
        }
    }
    /**
     * Edit Question load View and Get question Details
     */
    public function editQuestion()
    {
        session_start();

        if(isset($_SESSION['logged_admin']))
        {
            if(isset($_SESSION["questionData"])|| $_SESSION["success_msg"]){
                unset($_SESSION["questionData"]) ;
                unset($_SESSION["success_msg"]);
            }
            $id = $_GET["id"];
            $questions = $this->adminModel->editQuestion($id);

            $_SESSION["questionData"] = $questions;

            $this->view('pages/admin_edit_question');

        }else{
            $this->view('pages/admin_login');
        }
    }

    /**
     * Questions Update
     */
    public function updateQuestion()
    {
        session_start();

        if(isset($_SESSION['logged_admin']))
        {
            if(isset($_SESSION["old-question"]) || isset( $_SESSION["questionErrors"])){
                unset($_SESSION['old-question']);
                unset($_SESSION['questionErrors']);
            }
            if (isset($_SESSION["success_msg"]) ){
                unset($_SESSION["success_msg"] );
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

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
                    $result  = $this->adminModel->updateQuestion($_POST["id"], $question, $choice1, $choice2, $choice3, $choice4, $correct_answer);
                    if($result == "success"){
                        $data = [
                            $result => "Question Updated Successfully....."
                        ];
                        $_SESSION["success_msg"] = $data ;
                        header('Location: '.URL_ROOT."/adminPanel/listQuestion");

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
                    $this->view('pages/admin_edit_question');
                }
            }
        }else{
            $this->view('pages/admin_login');
        }
    }

    /**
     * Question Delete Method
     */
    public function deleteQuestion()
    {
        $id = $_GET["id"];
        $result = $this->adminModel->deleteQuestion($id);
        $output = ($result == "success") ?  $result :  "fail";
        echo json_encode($output);
    }

    /**
     * Generate question Details
     */
    public function quizDetails()
    {
        session_start();
        if(isset($_SESSION['email'])){
            $quiz = $this->adminModel->editQuiz($_GET["id"]);
            $quizQuestionsId = json_decode(get_object_vars($quiz[0])["quiz_questions"]);
            $questions = $this->adminModel->quizRelatedQuestions($quizQuestionsId);
            $_SESSION["quiz_details_list"] =["questions" => $questions,
                "quiz" => $quiz
            ];
            $this->view('pages/admin_quiz_details');
        }else{
            header("location:".URL_ROOT);
        }

    }
    public function scores()
    {
        session_start();
        if(isset($_SESSION['email'])){
            $scores = $this->adminModel->scores();
            $_SESSION["all_Students_Scores"] = $scores ;
            $this->view('pages/admin_students_scores');
        }else{
            header("location:".URL_ROOT);
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