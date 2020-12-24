<?php


class WelcomeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * List All Quizes
     * @return mixed|string[]
     */
    public function quizes()
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
     * get Quiz Data
     * @param $id
     * @return mixed
     */
    public function quizById($id)
    {
        $this->db->query("SELECT * FROM quizes WHERE quizes.id=$id ORDER BY created_at ASC; ");
        $result = $this->db->resultSet();
        return $result;
    }
    /**
     * get Questions in Quiz
     * @param $questions
     * @return array[]
     */
    public function quizRelatedQuestions($questions)
    {
        $selectedQuestions = [] ;
        foreach ($questions as $question){
            $this->db->query("SELECT * FROM questions WHERE questions.id=$question; ");
            $result = $this->db->resultSet();
            array_push($selectedQuestions, $result);
        }
        return $selectedQuestions ;
    }
    public function storeQuizRanking($data)
    {
        $currentDate = date("Y-m-d H:i:s");
        $quiz_id = $data["quiz_id"];
        $quiz_title = $data["quiz_title"];
        $student_email = $data["student_email"];
        $result = $data["result"];
        $student_correct_answers = json_encode($data["student_correct_answers"]);
        $student_wrong_answers = json_encode($data["student_wrong_answers"]);
        $status = $data["status"] ;
        $quiz_rank = $data["quiz_rank"];
        $this->db->query("INSERT INTO rankings ( quiz_id, quiz_title, student_email, student_result, student_correct_answers, student_wrong_answers, status, quiz_rank, created_at) VALUES ( '$quiz_id', '$quiz_title', '$student_email', '$result', '$student_correct_answers', '$student_wrong_answers', '$status','$quiz_rank','$currentDate') ");
        $this->db->execute() ;
        return "success";
    }
    public function studentHistory($email)
    {
        $this->db->query("SELECT * FROM rankings WHERE rankings.student_email='$email'; ");
        $result = $this->db->resultSet();
        if (empty($result)){
            return [
                "empty" => "No Quizes History"
            ];
        }else{
            return $result ;
        }

    }
}