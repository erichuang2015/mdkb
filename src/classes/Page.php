<?php
    
    namespace leorojas22\MDKB\Classes;
    
    class Page {
        
        private $metaDataNames = array("Title", "Sort");
        
        
        protected $path     = "";
        protected $title    = "";
        protected $route    = "";
        protected $content  = "";
        protected $sort     = 0;
        protected $hasMetaData = false;
        
        public function __construct($file, $folder) {
            
            $this->path = Knowledgebase::CONTENT_FOLDER."/".$folder."/".$file;
            
            $this->route = trim(strtolower(substr($file, 0, (strlen($file)-3))));
            // Determine meta data
            $content = explode("\n", file_get_contents($this->path));

            $foundMetaData = false;
            foreach($this->metaDataNames as $metaDataName) {
                // Look for meta data within first 3 lines
                for($i=0;$i<=2;$i++) {
                    if(isset($content[$i]) && substr($content[$i], 0, strlen($metaDataName)).":" == $metaDataName.":") {
                        switch($metaDataName) {
                            case "Title":
                                $this->title = $content[$i];
                                break;
                            case "Sort":
                                $this->sort = is_numeric($content[$i]) ? $content[$i] : 0;
                                break;
                        }
                        $this->hasMetaData = true;
                    }
                }
            }
            
            // Put content back to single string
            $content = implode("\n", $content);
                
            if($this->hasMetaData) {
                // Split content by --- to get actual content
                $content = explode("---", $content);
                if(count($content) > 0) {
                    // Actually has a --- in text
                    
                    // Remove the first set (meta data)
                    unset($content[0]);
                    
                    // Put content back together
                    $content = implode("---", $content);
                }
            }
            
            $this->content = $content;
            
        }
        
        public function __get($name) {
            return $this->{$name};
        }
        
    }

?>