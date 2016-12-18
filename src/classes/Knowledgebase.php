<?php
    
    namespace MDKB\Classes;
    
    
    class Knowledgebase {
        
        protected $categories = array();
        
        
        public function __construct() {
            
            $folders = scandir(CONTENT_FOLDER);
            
            if($folders) {
                // Search through all the folders in the content folder
                foreach($folders as $folder) {
                    if($folder == "." || $folder == "..") {
                        continue;
                    }
                    
                    if(is_dir(CONTENT_FOLDER."/".$folder)) {
                        // Create category for each folder found
                        $this->categories[] = new Category($folder);
                    }
                }
            }
            
            // Sort categories
            usort($this->categories, array("MDKB\Classes\Category", "compare"));
        }
        
        
        /**
         * Gets a category based on the given route.
         * 
         * @param type $route
         * @return mixed - When a category is found, it returns the category.  Otherwise returns false.
         */
        public function getCategory($route) {
            foreach($this->categories as $category) {
                if($category->route == $route) {
                    return $category;
                }
            }
            
            return false;
        }
        
        
        /**
         * Searches all pages in the knowledge base for the $searchTerm provided
         * 
         * @param type $searchTerm
         * @return array - An array of SearchResult objects which contains the matched Category and Page
         */
        public function search($searchTerm) {
            
            $matches    = array();
            $searchTerm = trim(strtolower($searchTerm));
            
            if(strlen($searchTerm) > 0) {
                foreach($this->categories as $category) {
                    foreach($category->pages as $page) {
                        // Check for matches
                        $matchedTitle   = substr_count(strtolower(strip_tags($page->content)), $searchTerm);
                        $matchedText    = substr_count(strtolower(strip_tags($page->content)), $searchTerm);
                        
                        if($matchedText > 0 || $matchedTitle > 0) {
                            // Match found! Store in results array
                            $matches[] = new SearchResult($category, $page);
                        }
                    }
                }
            }
            
            return $matches;
        }
        
        public function __get($name) {
            return $this->{$name};
        }
    }


?>