<?php
/*
    AV 08/10: Core class handles the URL parsing and routes the request to the right controller.
*/
    class Core{
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $param = [];

        public function __construct(){
            $urlArray = $this->getUrl();
            if(isset($urlArray[0])){
                if(file_exists('../app/controllers/'.$urlArray[0].'.php')){
                    $this->currentController = ucfirst($urlArray[0]);
                    unset($urlArray[0]);// need to unset the array item, as the remainder of the array will be passed as method & param.
                }
            }
            //open the file for the controller.
            require_once '../app/controllers/'.$this->currentController.'.php';
            //create an instance of the controller and assign to a variable
            $this->currentController = new $this->currentController;
            //$controller = new $this->currentController;
            
            if(isset($urlArray[1])){
                if(method_exists( $this->currentController, $urlArray[1])){
                    $this->currentMethod = $urlArray[1];
                    unset($urlArray[1]);// need to unset the array item, as the remainder of the array will be passed as param.
                }
            }
            $this->param = $urlArray ? array_values($urlArray) : [];  
            call_user_func_array([$this->currentController, $this->currentMethod], $this->param);
        }

        public function getUrl(){
           if(isset($_GET['url'])){
               $fullURL = rtrim($_GET['url'], "/"); // trim the ending "/" with the url
               $fullURL = filter_var($fullURL, FILTER_SANITIZE_URL); //Sanitizes the url of any character not permitted in URL.
               $urlArray = explode('/', $fullURL); // Get the different comp of URL.
               return $urlArray;
           }
        }
    }