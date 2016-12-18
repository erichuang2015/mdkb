        
<div class="container-fluid footer">
    <div class="row">
        <div class="col-md-12">
            <p class="text-right small text-muted">
                &copy; Copyright <?=date("Y")?> - <a href="/"><?=SITE_NAME?></a>
            </p>
        </div>
    </div>
</div>
        
        <script type="text/javascript" src="/assets/vendor/jquery/jquery-2.2.4.min.js"></script>
        <?if(isset($jsFiles)):?>
            <?foreach($jsFiles as $jsFile):?>
                <script type="text/javascript" src="<?=$jsFile?>"></script>
            <?endforeach?>
        <?endif?>
    </body>
</html>