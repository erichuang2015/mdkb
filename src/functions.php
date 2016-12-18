<?php

    /**
     * Attempts to get correct mime type due to default PHP functions 
     * returning text/plain for certain files such as .css or .js
     * 
     * @param type $file
     */
    function getMimeType($file) {
       
        $mimes = [
            "css"   => "text/css",
            "js"    => "text/javascript"
        ];
        
        $mimeType = false;
        foreach($mimes as $extension => $type) {
            if(substr($file, (strlen($extension)*-1)) == $extension) {
                $mimeType = $type;
                break;
            }
        }
        
        // Use default PHP functions to 
        if(!$mimeType) {
            $mimeType = mime_content_type($file);
        }
        
        return $mimeType;
    }

?>