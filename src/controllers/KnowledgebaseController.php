<?php
    
    namespace MDKB\Controllers;
 
    use Interop\Container\ContainerInterface;
    use MDKB\Classes\Knowledgebase;
    
    class KnowledgebaseController extends Controller {
        protected $kb;

        public function __construct(ContainerInterface $ci) {
            parent::__construct($ci);
            
            $this->kb = new Knowledgebase();
            $this->kb->loadCategories();
            
            $this->data['categories'] = $this->kb->categories;
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
                    
                    $this->data['pageTitle']    = $page->title;
                    $this->data['content']      = $page->content;       
                    $this->data['lastModified'] = $page->lastModified;
                    $this->data['fullRoute']    = $category->route."/".$page->route;
                    return $this->view($response, "page.php");
                    
                }
                
            }
            
            $this->data['pageTitle'] = "Page Not Found";
            return $this->view($response, "notfound.php");
        }
        
        public function search($request, $response, $args) {
            
            $searchTerm = (isset($_GET['term'])) ? $_GET['term'] : "";
            $this->data['pageTitle']        = "Search";
            $this->data['searchTerm']       = htmlentities($searchTerm);
            $this->data['searchResults']    = $this->kb->search($searchTerm);
            
            return $this->view($response, "search.php");
        }
        
    }

?>