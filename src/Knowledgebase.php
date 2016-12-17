<?php
    
    namespace leorojas22\MDKB;
    
    
    class Knowledgebase {
        
        const CONTENT_FOLDER = "../content";
        
        protected $categories = array();
        
        /**
         * Loads all categories and pages in the knowledgebase
         * 
         * - Searches the content folder for all folders which will become categories
         */
        public function loadCategories() {
            
            $folders = scandir(self::CONTENT_FOLDER);
            
            if($folders) {
                foreach($folders as $folder) {
                    if($folder == "." || $folder == "..") {
                        continue;
                    }
                    
                    if(is_dir(self::CONTENT_FOLDER."/".$folder)) {
                        $this->categories[] = new Category($folder);
                    }
                }
            }
            
        }
        
        public function __get($name) {
            return $this->{$name};
        }
        
        public function getCategory($route) {
            foreach($this->categories as $category) {
                if($category->route == $route) {
                    return $category;
                }
            }
            
            return false;
        }
    }


?>