<html>
    <head>
        <title><?=(isset($pageTitle)) ? $pageTitle." - ".$siteTitle : $siteTitle?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
        <?if(isset($cssFiles)):?>
            <?foreach($cssFiles as $cssFile):?>
                <link rel="stylesheet" type="text/css" href="<?=$cssFile?>">
            <?endforeach?>
        <?endif?>
    </head>
    <body>
        
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><?=$siteTitle?></a>
            </div>
        </nav>