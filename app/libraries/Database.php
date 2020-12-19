<?php

class Database
{
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $conn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try
        {
            $this->dbHandler = new PDO($conn, $this->db_user, $this->db_pass, $options);
        }
        catch (PDOException $exception)
        {
            $this->error = $exception->getMessage();
            echo $this->error;
        }
    }

    /**
     * Method Allows To Write Queries
     * @param $sql
     */
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    /**
     * Method Bind Values
     * @param $parameter
     * @param $value
     * @param null $type
     */
    public function bind($parameter, $value, $type = null)
    {
        switch(is_null($type))
        {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL ;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL ;
                break;
            default:
                $type = PDO::PARAM_STR ;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    /**
     * Execute The Prepared Statement
     * @return mixed
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    /**
     * Return an Array
     * @return mixed
     */
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Return a Specific Row of an Object
     * @return mixed
     */
    public function singleRow()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * counts the rows Affected by Query
     * @return mixed
     */
    public function rowCount()
    {
        return $this->statement->rowCount();
    }

}