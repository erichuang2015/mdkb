<?php
    
    namespace MDKB;
 
    class KnowledgebaseController {
        
        public function page($category, $page) {
            
            // Try to find file
            
            $file = "../content/".$category."/".$page;
            if(file_exists($file)) {
                
                $parsedown = new Parsedown();
                
                $fileContents = file_get_contents($file);
                
                return $parsedown->text($fileContents);
                
            }
            else {
                return false;
            }
            
        }
        
    }

?>