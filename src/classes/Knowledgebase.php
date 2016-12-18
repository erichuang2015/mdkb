<?php
    
    namespace MDKB\Classes;
    
    
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
            
            // Sort pages
            usort($this->categories, array("MDKB\Classes\Category", "compare"));
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
        
        public function search($searchTerm) {
            
            $matches    = array();
            $searchTerm = trim(strtolower($searchTerm));
            
            if(strlen($searchTerm) > 0) {
                foreach($this->categories as $category) {
                    foreach($category->pages as $page) {
                        // Check match percentage
                        $matchedTitle   = substr_count(strtolower(strip_tags($page->content)), $searchTerm);
                        $matchedText    = substr_count(strtolower(strip_tags($page->content)), $searchTerm);
                        
                        if($matchedText > 0 || $matchedTitle > 0) {
                            // Save as match if greater than 50%
                            $matches[] = new SearchResult($category, $page);
                        }
                    }
                }
            }
            
            return $matches;
        }
    }


?>