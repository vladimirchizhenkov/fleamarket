<?php foreach ($products as $product): ?>

    <div class="card-out inner inner--flex inner--flex-column">
<!--        <div class="card-out__favorite"><i class="fa fa-heart" aria-hidden="true"></i></div>-->
        <a href="/product/<?=$product['product_id']?>" class="card-out__link">
            <img class="card-out__img" src="<?=$product['product_photo']?>" alt="product img"/>
        </a>
        <a href="/product/<?=$product['product_id']?>" class="card-out__link link link--black">
            <div class="card-out__title"><?=$product['product_title']?></div>
        </a>
        <div class="card-out__price text text--title-s"><?=$product['product_price']?> <span
                class="card-out__span">₽</span></div>
        <div class="card-out__seller"><?=$product['user_name'] . ', г.' . $product['user_city']?></div>
        <div class="card-out__date">Добавлено: <?=$product['product_date']?></div>
<!--        <div class="card-out__alert">Добавлено в <a class="link link--white"-->
<!--                                                    href="/favorite">избранное</a></div>-->
    </div>

<?php endforeach; ?>