<?php

/**
 * Core Class .
 *
 */
class Core
{
    protected $currentController = 'Pages' ;
    protected $currentMethod = 'index' ;
    protected $params = [];

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $url = $this->getUrl();

        //Looking in Controllers for first value
        if(file_exists('../app/controllers/'. ucwords($url[0]) . '.php'))
        {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        //Require The Controller
        require_once '../app/controllers/' . $this->currentController .'.php';
        $this->currentController = new $this->currentController;

        //Check second part of url
       if (isset($url[1]))
       {
           if(method_exists($this->currentController, $url[1]))
           {
               $this->currentMethod = $url[1];
               unset($url[1]);
           }
       }

        //Check if url Contain Params
        $this->params = $url ? array_values($url) : [] ;
        //call a callback with array of params
        call_user_func([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * @return false|string[]
     */
    public function getUrl()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'],'/') ;
            //filter url variables as string/number
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //break URL into Array
            $url = explode('/', $url);
            return $url;
        }
    }
}