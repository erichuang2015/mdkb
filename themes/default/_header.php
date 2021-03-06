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
        
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h1><a href="/"><?=$siteTitle?></a></h1>
                    </div>
                    <?if(isset($pageTitle)):?>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <form action="/search" action="get" class="search-form form-inline text-right">
                            <input type="text" name="term" class="form-control" size="40" placeholder="Search">
                        </form>
                    </div>    
                    <?endif?>
                </div>
            </div>
        </div>