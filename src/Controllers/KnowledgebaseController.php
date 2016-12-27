<?php
    
    namespace MDKB\Controllers;
 
    use MDKB\Classes\Knowledgebase;
    
    class KnowledgebaseController extends Controller {
        protected $kb;
        
        public function __construct() {
            parent::__construct();
            
            $this->kb = new Knowledgebase();
            
            $this->data['categories'] = $this->kb->categories;
        }
        
        public function test() {
            
        }
        
        public function home() {
            return $this->view("home.php");
        }
        
        
        public function page($category, $page) {

            $categoryRoute  = $category;
            $pageRoute      = $page;

            $category   = $this->kb->getCategory($categoryRoute);
            $page       = false;
            
            if($category) {
                $page = $category->getPage($pageRoute);
                
                $this->data['category'] = $category;
                
                if($page) {
                    
                    $this->data['pageTitle']    = $page->title;
                    $this->data['content']      = $page->content;       
                    $this->data['lastModified'] = $page->lastModified;
                    $this->data['fullRoute']    = $category->route."/".$page->route;
                    return $this->view("page.php");
                    
                }
                
            }
            
            $this->data['pageTitle'] = "Page Not Found";
            return $this->view("notfound.php");
        }
        
        public function search() {
            
            $searchTerm = (isset($_GET['term'])) ? $_GET['term'] : "";
            $this->data['pageTitle']        = "Search";
            $this->data['searchTerm']       = htmlentities($searchTerm);
            $this->data['searchResults']    = $this->kb->search($searchTerm);
            
            return $this->view("search.php");
        }
        
    }

?>