<?php


class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
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


}