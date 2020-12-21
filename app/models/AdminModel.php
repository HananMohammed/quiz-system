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

    public function listStudents()
    {
        $output = [] ;
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
    public function createQuiz($quiz_title, $question_numbers, $mark_on_right, $minus_on_wrong)
    {
        $currentData = date("Y-m-d H:i:s");

        $this->db->query("INSERT INTO questions ( quiz_title, question_numbers, mark_on_right, minus_on_wrong, created_at) VALUES ( '$quiz_title', '$question_numbers', '$mark_on_right', '$minus_on_wrong', '$currentData') ");

        $this->db->execute() ;

        return "success";
    }
    public function deleteStudent($id)
    {
        $this->db->query("DELETE FROM students WHERE students.id = $id");
        $this->db->execute();
        return "success" ;
    }
}