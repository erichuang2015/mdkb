<?php
    
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require("../vendor/autoload.php");

/*
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
*/

// Initialize Slim Framework
$app = new \Slim\App;
$container = $app->getContainer();

$container['themeName'] = THEME_NAME;
$container['siteTitle'] = SITE_NAME;

// Set up view engine
$container['view'] = function($container) {
    return new \Slim\Views\PhpRenderer("../themes/".$container['themeName']."/");
};



// Load assets from theme folders
$app->get("/assets[/{params:.*}]", function($request, $response, $args) {
    $params = $request->getAttribute("params");

    $assetPath = "../themes/".$this->themeName."/assets/".$params;
    
    if(file_exists($assetPath)) {
        $data       = file_get_contents($assetPath);
        $mimeType   = getMimeType($assetPath);
        $response   = $response->withHeader("Content-type", $mimeType);
        
        $response->getBody()->write($data);
        return $response;
    }
    
    return $response->withStatus(404);
    
});

// Routes
$app->get("/", "MDKB\Controllers\KnowledgebaseController:home");
$app->get("/{category}/{page}", "MDKB\Controllers\KnowledgebaseController:page");

$app->run();

?>