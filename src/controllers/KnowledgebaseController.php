<?php
    
    namespace leorojas22\MDKB\Controllers;
 
    use Interop\Container\ContainerInterface;
    use leorojas22\MDKB\Classes\Knowledgebase;
    
    class KnowledgebaseController extends Controller {
        
        protected $kb;
        protected $data;
        
        public function __construct(ContainerInterface $ci) {
            parent::__construct($ci);
            
            $this->kb = new Knowledgebase();
            $this->kb->loadCategories();
            
            $this->data = ["categories" => $this->kb->categories];
        }
        
        public function home($request, $response, $args) {
            return $this->view($response, "home.php");
        }
        
        
        public function page($request, $response, $args) {

            $categoryRoute  = $args['category'];
            $pageRoute      = $args['page'];

            $category   = $this->kb->getCategory($categoryRoute);
            $page       = false;
            
            if($category) {
                $page = $category->getPage($pageRoute);
                
                $this->data['category'] = $category;
                
                if($page) {
                    
                    $parsedown = new \Parsedown();
                    $this->data['title']      = $page->title;
                    $this->data['content']    = $parsedown->text($page->content);       
                    
                    return $this->view($response, "page.php");
                    
                }
                
            }
            
            return $this->view($response, "notfound.php");
        }
        
    }

?>