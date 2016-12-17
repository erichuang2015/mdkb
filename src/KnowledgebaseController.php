<?php
    
    namespace leorojas22\MDKB;
 
    class KnowledgebaseController {
        
        protected $kb;
        
        public function __construct() {
            
            $this->kb = new Knowledgebase();
            $this->kb->loadCategories();
        }
        
        public function page($request, $response, $args) {

            $categoryRoute  = $args['category'];
            $pageRoute      = $args['page'];

            $data       = [];
            
            $category   = $this->kb->getCategory($categoryRoute);
            $page       = false;
            
            if($category) {
                $page = $category->getPage($pageRoute);
                if($page) {
                    $data['page'] = $page;

                    $parsedown = new \Parsedown();
                    echo $parsedown->text($page->content);
                    
                    return;
                }
                
            }
            
            echo "page not found";
        }
        
    }

?>