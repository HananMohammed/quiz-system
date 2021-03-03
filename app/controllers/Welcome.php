<?php

require_once "../vendor/autoload.php";
include_once "../app/helpers/Helpers.php";


class Welcome extends Controller
{
    use Helpers;
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
    public function home()
    {
        session_start();
        if(isset($_SESSION['email']))
        {
            $all_quiz = [];
            $student_history = $this->welcomeModel->studentHistory($_SESSION['email']);
            if(!isset($student_history["empty"])){
                foreach ($student_history as $history){
                    $history = get_object_vars($history);
                    $submittedQuiz = $history["quiz_title"] ;
                    $quizes = $this->welcomeModel->quizesExceptSubmittes($submittedQuiz);
                    array_push($all_quiz,$quizes);
                }

            }
            $quizes = $this->welcomeModel->quizes();
            array_push($all_quiz,$quizes);
            $_SESSION['quizes'] = $all_quiz;
            $this->view('pages/student_quiz_home', $quizes);
        }
        else{
            header("location:".URL_ROOT);
        }

    }
    public function questions()
    {
        session_start();
        if(isset($_SESSION['email'])){
            $quiz = $this->welcomeModel->quizById($_GET["id"]);
            $quizQuestionsId = json_decode(get_object_vars($quiz[0])["quiz_questions"]);
            $questions = $this->welcomeModel->quizRelatedQuestions($quizQuestionsId);

            $_SESSION["our_student_quiz"] =[
                "questions" => $questions,
                "quiz" => $quiz
            ];
            $this->view('pages/student_quiz_questions');
        }
        else{
            header("location:".URL_ROOT);
        }


    }
    public function quizSubmit()
    {
        session_start();
        if(isset($_SESSION['email']))
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $quiz = $this->welcomeModel->quizById($_GET["id"]);
                $quizQuestionsId = json_decode(get_object_vars($quiz[0])["quiz_questions"]);
                $questions = $this->welcomeModel->quizRelatedQuestions($quizQuestionsId);
                $questionsRanking =[];
                $questionsWrongRanking = [] ;
                foreach ($quizQuestionsId as $key => $questionId){
                    $answer = "answer_question_".$key ;
                    $correct_answer = (array)$questions[$key][0]->correct_answer ;
                    if (isset($_POST[$answer])){
                        if($correct_answer[0] === $_POST[$answer][0]){
                            $studentAnswer = [
                                $answer => $_POST[$answer][0]
                            ];
                            array_push($questionsRanking, $studentAnswer);
                        }else if($correct_answer[0] !== $_POST[$answer][0]){
                            $studentWrongAnswer = [
                                $answer => $_POST[$answer][0]
                            ];
                            array_push($questionsWrongRanking, $studentWrongAnswer) ;
                        }
                    }
                }
                $studentScore =  count($questionsRanking) * get_object_vars($quiz[0])["mark_on_right"];
                $quiz_title = $this->welcomeModel->quizById($_GET["id"]);

                //$studendMinusScore = (count($questions) - count($questionsRanking)) * get_object_vars($quiz[0])["minus_on_wrong"];
                //$studentResult = $studentScore - $studendMinusScore ;
                $ranking = [
                    "quiz_id" => $_GET["id"],
                    "quiz_title" => get_object_vars($quiz_title[0])["quiz_title"],
                    "student_email" => $_SESSION['email'],
                    "result" => $studentScore,
                    "student_correct_answers" => $questionsRanking,
                    "student_wrong_answers" => $questionsWrongRanking,
                    "status" => $studentScore >= ( count($questions) * get_object_vars($quiz[0])["mark_on_right"] * 0.5 ) ? "success" : "fail",
                    "quiz_rank" => count($questions)* get_object_vars($quiz[0])["mark_on_right"]
                ];
                $this->welcomeModel->storeQuizRanking($ranking);
                //Send Email
                $this->email($ranking["student_email"],$ranking["quiz_title"],$ranking["result"],$ranking["status"]);

                if ($ranking["result"] >= $ranking["quiz_rank"] * 0.5 )
                {
                    $result = [
                        "totalQuestions" => count($questions),
                        "right_answer" => count($questionsRanking),
                        "wrong_answer" => count($questions) - count($questionsRanking),
                        "over_all_score" => $studentScore,
                        "status" => "success"
                    ];
                    $this->quizResult($result) ;
                }else{
                    $result = [
                        "totalQuestions" => count($questions),
                        "right_answer" => count($questionsRanking),
                        "wrong_answer" => count($questions) - count($questionsRanking),
                        "over_all_score" => $studentScore,
                        "status" => "fail"
                    ];
                   $this->quizResult($result) ;
                }
            }
        }
        else{
            header("location:".URL_ROOT);
        }

    }
    public function quizResult($result)
    {
        if(isset($_SESSION['email']))
        {
            $_SESSION["student_final_result"] = $result ;
            $this->view("pages/student_quiz_result", $result);
        }
        else{
            header("location:".URL_ROOT);
        }

    }
    public function history()
    {
        session_start();
        if(isset($_SESSION['email'])){
            $email = $_SESSION["email"];
            $history = $this->welcomeModel->studentHistory($email);
            $_SESSION["student_history"] = $history;
            $this->view("pages/student_quiz_history", $history) ;
        }
        else{
            header("location:".URL_ROOT);
        }
    }
    public function quizAnswers()
    {
        session_start();
        if(isset($_SESSION['email'])){
            $quiz = $this->welcomeModel->quizById($_GET["id"]);
            $quizQuestionsId = json_decode(get_object_vars($quiz[0])["quiz_questions"]);
            $questions = $this->welcomeModel->quizRelatedQuestions($quizQuestionsId);

            $_SESSION["student_quiz_and_answers"] =[
                "questions" => $questions,
                "quiz" => $quiz
            ];
            $this->view("pages/student_quiz_answers") ;
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