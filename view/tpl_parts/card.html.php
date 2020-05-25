<div class="card-in">

    <div class="card-in__header inner inner--flex inner--flex-between">
        <div class="inner">
            <div class="card-in__title text text--size-xl">
                <?=$card['product_title']?>
            </div>
            <div class="inner">
                <div class="card-in__date">Размещено <?=$card['product_date']?></div>
<!--                <input type="submit" class="button" value="Добавить в избранное" />-->
            </div>
        </div>
        <div class="inner">
            <div class="card-in__price text text--size-xl"><?=$card['product_price']?> ₽</div>
        </div>
    </div>

    <div class="inner inner--flex inner--flex-between">
        <div class="card-in__gallery inner inner--flex inner--flex-center">

            <div><img src="<?php $card['product_photo'] ?
                    print_r($card['product_photo']) :
                    print_r('/source/uploads/dump.jpg')
                ?>" alt="photo item" />
            </div>

        </div>
        <div class="inner inner--flex inner--flex-column card-in__contacts">
            <input type="submit" class="button card-in__tel" value="Показать контакты продавца" />
            <a href="" class="link link--black card-in__user-name"><?=$card['name']?></a>
            <div class="card-in__user-adress">Город <?=$card['city']?></div>
        </div>
    </div>

    <div class="inner card-in__description">
        <p><?=$card['product_description']?></p>
        <a class="link link--black" href="/">Вернуться на главную</a>
    </div>

</div>