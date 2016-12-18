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