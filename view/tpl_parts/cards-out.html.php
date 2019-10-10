<?php foreach ($mFProducts as $mFProduct): ?>

    <div class="card-out inner inner--flex inner--flex-column">
<!--        <div class="card-out__favorite"><i class="fa fa-heart" aria-hidden="true"></i></div>-->
        <a href="/product/<?=$mFProduct['id']?>" class="card-out__link">
            <img class="card-out__img" src="<?=$mFProduct['ftrade_photo']?>" alt="product img"/>
        </a>
        <a href="/product/<?=$mFProduct['id']?>" class="card-out__link link link--black">
            <div class="card-out__title text--title-s"><?=$mFProduct['ftrade_product']?></div>
        </a>
        <div class="card-out__price text text--title-s"><?=$mFProduct['ftrade_price']?> <span
                class="card-out__span">₽</span></div>
        <div class="card-out__seller"><?=$mFProduct['ftrade_user']?></div>
        <div class="card-out__date">Добавлено: <?=$mFProduct['ftrade_date']?></div>
<!--        <div class="card-out__alert">Добавлено в <a class="link link--white"-->
<!--                                                    href="/favorite">избранное</a></div>-->
    </div>

<?php endforeach; ?>