<?php

class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create($name, $password, $email, $college)
    {
        $currentData = date("Y-m-d H:i:s");

       $data =  $this->db->query("INSERT INTO students ( name, email, password, college, created_at) VALUES ( '$name', '$email', '$password', '$college', '$currentData') ");

       $this->db->execute() ;

       return "success" ;
    }
    public function getEmail($email)
    {
        $this->db->query("SELECT email from students WHERE email='$email'");

        $result = $this->db->resultSet();

        return $result ;
    }
    public function auth($email, $password)
    {

        $this->db->query("SELECT * from students WHERE email='$email'");

        $result = $this->db->resultSet();
        $data = get_object_vars($result[0]) ;
        if (password_verify($password, $data["password"]))
        {
            return [
                "availability" => "allowed",
                "data" => $data
            ] ;
        }
        else{
            return [ "availability" => "notAllowed" ] ;
        }

    }
}