<?php

    namespace MDKB\Controllers;
    
    abstract class Controller {
        
        protected $app;
        protected $data;
        
        public function __construct() {
            $this->data = ["siteTitle" => ""];
            $this->app = \Slim\Slim::getInstance();
        }
        
        public function view($view, $data = false) {
            
            if($data) {
                $this->data = $data;
            }
            
            return $this->app->render($view, $this->data);
        }
        
    }

?>