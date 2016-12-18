<?php include("_header.php"); ?>

<div class="container-fluid page">
    <div class="row">
        <div class="col-md-3 menu">
            <?if(count($categories) > 0):?>
                <?foreach($categories as $category):?>
                <div class="list-group">
                    <h5><?=$category->name?></h5>
                    <?if(count($category->pages) > 0):?>
                        <?foreach($category->pages as $page):?>
                        <div class="list-group-item <?=($fullRoute == $category->route."/".$page->route) ? "selected" : ""?>">
                            <a href="/<?=$category->route?>/<?=$page->route?>"><?=$page->title?></a>
                        </div>
                        <?endforeach?>
                    <?endif?>
                </div>
                <?endforeach?>
            <?endif?>
        </div>
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <h1><?=$pageTitle?></h1>
                </div>
                <div class="panel-body">
                    <?=$content?>
                    <br>
                    <p class="small text-right text-muted">Last modified: <?=$lastModified?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("_footer.php"); ?>