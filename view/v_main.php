<!doctype html>
<html lang="en">

<?php include_once 'tpl_parts/head.html.php' ?>

<body>
<div class="body-wrapper">

    <?php include_once 'tpl_parts/header.php' ?>

    <?php include_once 'tpl_parts/top-nav.html.php'?>

    <div class="content">
        <div class="container">
            <div class="content__basic inner inner--flex">

                <div class="content__main content__main--wide">
                    <h1 class="text text--title-s"><?= $title ?></h1>
                    <div class="inner inner--flex inner--flex-between inner--flex-wrap">

                        <?= $content ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'tpl_parts/footer.php' ?>

</div>

<script type="module" src="/source/js/common.js"></script>
<script type="module" src="/source/js/ajax.js"></script>
<!--<script src="/source/js/validate-form.js"></script>-->

</body>
</html>