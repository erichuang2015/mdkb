<?php

    namespace MDKB\Controllers;
    
    use Interop\Container\ContainerInterface;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    abstract class Controller {
        
        protected $ci;
        protected $data;
        
        public function __construct(ContainerInterface $ci) {
            $this->ci = $ci;
            $this->data = [];
        }
        
        public function view(Response $response, $view, $data = false) {
            
            if($data) {
                $this->data = $data;
            }
            
            return $this->ci->get("view")->render($response, $view, $this->data);
        }
        
        
    }

?>