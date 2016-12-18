<?php include("_header.php"); ?>
        
        <div class="jumbotron">
            <form action="/search" method="get" class="form-inline text-center">
                <div class="form-group">
                    <input type="text" name="term" class="form-control input-lg" size="50" placeholder="Search the knowledge base">
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

<?php 
    $jsFiles = array(
        "/assets/vendor/masonry/masonry.pkgd.min.js",
        "/assets/js/home.js"
    );
    include("_footer.php"); 
?>