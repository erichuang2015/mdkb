<?php
    
    namespace MDKB\Classes;
    
    class SearchResult {
        
        protected $category;
        protected $page;
        
        public function __construct(Category $category, Page $page) {
            $this->category = $category;
            $this->page     = $page;
        }
        
        public function __get($name) {
            
            if($name == "text") {
                // Format the search result text - Limit to 400 characters and add ellipsis if text is shortened
                $stripedContent = strip_tags($this->page->content);
                $text = substr($stripedContent, 0, 400);
                if(strlen($stripedContent) > strlen($text)) {
                    $text .= "...";
                }
                
                return $text;
            }
            
            return $this->{$name};
        }
        
    }

?>
