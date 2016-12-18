<?php

    namespace MDKB\Classes;
    
    class Category {
        
        protected $path     = "";
        protected $route    = "";
        protected $folder   = "";
        protected $name     = "";
        protected $sort     = 0;
        protected $pages    = array();
        
        
        public function __construct($folder) {
            
            $this->route = strtolower($folder);
            
            $this->path = CONTENT_FOLDER."/".$folder;
            
            // Determine the category name based on the folder
            if(file_exists($this->path."/actual_name")) {
                // actual_name file exists - use this as the name
                $this->name = file_get_contents($this->path."/actual_name");
            }
            else {
                // Replace dashes with spaces and uppercase first letter of each word
                $this->name = ucwords(str_replace("-", " ", $folder));
            }
            
            // Determine sort order
            if(file_exists($this->path."/sort")) {
                // sort file exists - use this as sort order
                $sort = file_get_contents($this->path."/sort");
                $this->sort = (is_numeric($sort)) ? $sort : 0;
            }
         
            // Find all category pages
            $pages = scandir($this->path);

            foreach($pages as $page) {
                if(substr($page, -3) == ".md" && is_file($this->path."/".$page)) {
                    $this->pages[] = new Page($page, $folder);
                }
            }
            
            // Sort pages
            usort($this->pages, array("MDKB\Classes\Page", "compare"));
        }
        
        public function getPage($route) {
            
            foreach($this->pages as $page) {
                if($page->route == $route) {
                    return $page;
                }
            }
            
            return false;
        }
        
        
        public function __get($name) {
            return $this->{$name};
        }
        
        public static function compare($a, $b) {
            return strcmp($a->name, $b->name);
        }
        
    }

?>
