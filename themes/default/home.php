<html>
    <head>
        <title><?=(isset($pageTitle)) ? $pageTitle : "Knowledge Base"?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    </head>
    <body>
        
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">MDKB</a>
            </div>
        </nav>
        
        <div class="jumbotron">
            <form class="form-inline text-center">
                <div class="form-group">
                    <input type="text" class="form-control input-lg" size="50" placeholder="Search the knowledge base">
                    <button type="submit" class="btn btn-primary btn-lg">Search</button>
                </div>
            </form>
        </div>
        
        <div class="container-fluid">
            <div class="row categories">
                <?if(count($categories) > 0):?>
                    <?foreach($categories as $category):?>
                    <div class="col-md-4 category">
                        <div class="panel panel-default">
                            <h4 class="panel-heading"><?=$category->name?></h4>
                            <?if(count($category->pages) > 0):?>
                            <ul class="list-group">
                                <?foreach($category->pages as $page):?>
                                <li class="list-group-item"><a href="/<?=$category->route?>/<?=$page->route?>"><?=$page->title?></a></li>
                                <?endforeach?>
                            </ul>
                            <?endif?>
                        </div>
                    </div>
                    <?endforeach?>
                <?endif?>
            </div>
        </div>
        
        
        <script type="text/javascript" src="/assets/vendor/jquery/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="/assets/vendor/masonry/masonry.pkgd.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.categories').masonry({
                    itemSelector: '.category'
                });
            });
        </script>
    </body>
</html>