<?php include("_header.php"); ?>

<div class="container-fluid page">
    <div class="row">
        <?php include("_page_menu.php"); ?>
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <h2>Search Results for: <?=$searchTerm?></h2>
                </div>
                <div class="panel-body">
                    <?if(count($searchResults) > 0):?>
                        <?foreach($searchResults as $result):?>
                        <div class="search-result">
                            <h3>
                                <a href="/<?=$result->category->route?>/<?=$result->page->route?>"><?=$result->page->title?></a>
                            </h3
                            <p><?=preg_replace("/(".$searchTerm.")/i", '<span class="highlight">$1</span>', $result->text)?></p>
                        </div>
                        <?endforeach?>
                    <?else:?>
                    <p class="text-muted">No results found for "<?=$searchTerm?>"</p>
                    <?endif?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("_footer.php"); ?>