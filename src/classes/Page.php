<?php
    
    namespace MDKB\Classes;
    
    class Page {
        
        private $metaDataNames = array("Title", "Sort");
        
        protected $path         = "";
        protected $title        = "";
        protected $route        = "";
        protected $content      = "";
        protected $sort         = 0;
        protected $lastModified = 0;
        
        public function __construct($file, $folder) {
            
            $this->path         = CONTENT_FOLDER."/".$folder."/".$file;
            $this->lastModified = date(DATE_FORMAT, filemtime($this->path));
            $this->route        = trim(strtolower(substr($file, 0, (strlen($file)-3))));
            
            $content = explode("\n", file_get_contents($this->path));

            // Determine if there is meta data
            $foundMetaData = false;
            foreach($this->metaDataNames as $metaDataName) {
                // Look for meta data within first 3 lines
                for($i=0;$i<=2;$i++) {
                    if(isset($content[$i]) && substr($content[$i], 0, strlen($metaDataName)).":" == $metaDataName.":") {
                        $metaDataValue = trim(substr($content[$i], strlen($metaDataName.":")));
                        switch($metaDataName) {
                            case "Title":
                                $this->title = $metaDataValue;
                                break;
                            case "Sort":
                                $this->sort = is_numeric($metaDataValue) ? $metaDataValue : 0;
                                break;
                        }
                        $foundMetaData = true;
                    }
                }
            }
            
            // Put content back to single string
            $content = implode("\n", $content);
                
            if($foundMetaData) {
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
            
            $this->content = \Parsedown::instance()->text($content);
            
        }
        
        public function __get($name) {
            return $this->{$name};
        }
        
        public static function compare($a, $b) {
            return strcmp($a->sort, $b->sort);
        }
        
    }

?>