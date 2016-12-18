<?php include("_header.php"); ?>

<div class="container-fluid page">
    <div class="row">
        <?php include("_page_menu.php"); ?>
        <div class="col-md-9">
            <div class="panel" data-spy="affix" data-offset-top="100" data-offset-bottom="30">
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

<?php 
    $jsFiles = array(
        "/assets/vendor/bootstrap/js/bootstrap.min.js"
    );
    include("_footer.php"); 
?>