<?php


class Controller
{

    /**Load The Required Model
     * @param $model
     * @return mixed
     */
    public function model($model)
    {
        //Require Model Files
        require_once '../app/models/'.$model.'.php';
        //Instantiate model
        return new $model();
    }

    /**
     * Load The View After Check For The File
     * @param $view
     * @param array $data
     */
    public function view($view, $data = [])
    {
        if(file_exists('../app/views/'. $view . '.php'))
        {
            require_once '../app/views/'. $view . '.php';
        }
        else
        {
            die("View Doesn't Exist ");
        }
    }
}