<?php


class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Authenticate Admin
     * @param $email
     * @param $password
     * @return array|string[]
     */
    public function auth($email, $password)
    {

        $this->db->query("SELECT * from admins WHERE email='$email'");

        $result = $this->db->resultSet();
        if(!empty($result))
        {
            $data = get_object_vars($result[0]) ;
            if (password_verify($password, $data["password"]))
            {
                return [
                    "availability" => "allowed",
                    "data" => $data
                ] ;
            }
        }
        else{
            return [ "availability" => "notAllowed" ] ;
        }

    }

    /**
     * List Students
     * @return mixed|string[]
     */
    public function listStudents()
    {
        $this->db->query("SELECT * FROM students ");
        $result = $this->db->resultSet();
        if(!empty($result))
        {
            return $result;
        }
        else{
            return [
                "empty" => "No Students Added Yet "
            ];
        }
    }

    /**
     * Delete Students
     * @param $id
     * @return string
     */
    public function deleteStudent($id)
    {
        $this->db->query("SELECT * FROM students WHERE students.id = $id ");
        $output = $this->db->resultSet() ;
        if (!empty($output)){
            $result  = get_object_vars($output[0]);
            $email = $result["email"] ;
            $this->db->query("DELETE FROM rankings WHERE student_email = '$email' ");
            $this->db->execute();

        }
        $this->db->query("DELETE FROM students WHERE students.id = $id");
        $this->db->execute();

        return "success" ;
    }

    /**
     * Store Quiz
     * @param $quiz_title
     * @param $mark_on_right
     * @param $minus_on_wrong
     * @param $quiz_questions
     * @return string
     */
    public function createQuiz($quiz_title, $mark_on_right, $minus_on_wrong, $quiz_questions)
    {
        $currentData = date("Y-m-d H:i:s");

        $this->db->query("INSERT INTO quizes ( quiz_title, mark_on_right, minus_on_wrong, quiz_questions, created_at) VALUES ( '$quiz_title', '$mark_on_right', '$minus_on_wrong', '$quiz_questions', '$currentData') ");

        $this->db->execute() ;

        return "success";
    }

    /**
     * List All Quizes
     * @return mixed|string[]
     */
    public function listQuizes()
    {
        $this->db->query("SELECT * FROM quizes ORDER BY created_at ASC; ");
        $result = $this->db->resultSet();
        if(!empty($result))
        {
            return $result;
        }
        else{
            return [
                "empty" => "No Quizes Added Yet "
            ];
        }
    }

    /**
     * get Quiz Data For Edit
     * @param $id
     * @return mixed
     */
    public function editQuiz($id)
    {
        $this->db->query("SELECT * FROM quizes WHERE quizes.id=$id ORDER BY created_at ASC; ");
        $result = $this->db->resultSet();
        return $result;
    }
    public function updateQuiz($id, $quiz_title, $mark_on_right, $minus_on_wrong, $quiz_questions)
    {
        $this->db->query("UPDATE quizes SET quiz_title='$quiz_title', mark_on_right='$mark_on_right', minus_on_wrong='$minus_on_wrong', quiz_questions='$quiz_questions' WHERE quizes.id='$id'");
        $this->db->execute();
        return "success" ;
    }

    /**
     * @param $questions
     * @return array[]
     */
    public function quizRelatedQuestions($questions)
    {
        $selectedQuestions = [] ;
        $all_Questions  = [];
        foreach ($questions as $question){
            $this->db->query("SELECT * FROM questions WHERE questions.id=$question; ");
            $result = $this->db->resultSet();
            array_push($selectedQuestions, $result);
        }
        $all_Questions = $this->listquestions();
        return [
            "selectedQuestions" =>$selectedQuestions,
            "all_Questions" =>$all_Questions
        ];
    }
    public function quizQuestionsDatails($questions)
    {
        $selectedQuestions = [] ;
        foreach ($questions as $question){
            $this->db->query("SELECT * FROM questions WHERE questions.id=$question; ");
            $result = $this->db->resultSet();
            array_push($selectedQuestions, $result);
        }
        return $selectedQuestions ;

    }
    /**
     * Delete Quiz
     * @param $id
     * @return string
     */
    public function deleteQuiz($id)
    {
        $this->db->query("DELETE FROM quizes WHERE quizes.id = $id");
        $this->db->execute();
        return "success" ;
    }

    /**
     * delete Question
     * @param $id
     * @return string
     */
    public function deleteQuestion($id)
    {
        $this->db->query("DELETE FROM questions WHERE questions.id = $id");
        $this->db->execute();
        return "success" ;
    }

    /**
     * Create Question
     * @param $question
     * @param $choice1
     * @param $choice2
     * @param $choice3
     * @param $choice4
     * @param $correct_answer
     * @return string
     */
    public function createQuestion($question, $choice1, $choice2, $choice3, $choice4, $correct_answer)
    {
        $currentDate = date("Y-m-d H:i:s");

        $this->db->query("INSERT INTO questions ( question, choice1, choice2, choice3, choice4, correct_answer, created_at) VALUES ( '$question', '$choice1', '$choice2', '$choice3', '$choice4','$correct_answer','$currentDate') ");

        $this->db->execute();

        return "success" ;
    }

    /**
     * List All Questions
     * @return mixed|string[]
     */
    public function listquestions()
    {
        $this->db->query("SELECT * FROM questions ORDER BY created_at ASC; ");
        $result = $this->db->resultSet();
        if(!empty($result))
        {
            return $result;
        }
        else{
            return [
                "empty" => "No Questions Added Yet "
            ];
        }
    }

    /**
     * get Question Data
     * @param $id
     * @return mixed
     */
    public function editQuestion($id)
    {
        $this->db->query("SELECT * FROM questions WHERE questions.id=$id ORDER BY created_at ASC; ");
        $result = $this->db->resultSet();
        return $result;
    }

    /**
     * Question Update
     * @param $id
     * @param $question
     * @param $choice1
     * @param $choice2
     * @param $choice3
     * @param $choice4
     * @param $correct_answer
     * @return string
     */
    public function updateQuestion($id, $question, $choice1, $choice2, $choice3, $choice4, $correct_answer)
    {
        $this->db->query("UPDATE questions SET question='$question', choice1='$choice1', choice2='$choice2', choice3='$choice3', choice4='$choice4', correct_answer='$correct_answer' WHERE questions.id='$id'");
        $this->db->execute();
        return "success" ;
    }
    public function scores()
    {
        $this->db->query("SELECT * FROM rankings ORDER BY student_email DESC ; ");
        $result = $this->db->resultSet();
        if (!empty($result)){
            return $result ;
        }else{
            return [
                "empty" => "No Student Tested Yet "
            ];
        }
    }
}