<div class="card-in">

    <div class="card-in__header inner inner--flex inner--flex-between">
        <div class="inner">
            <div class="card-in__title text text--size-xl">
                <?=$card['ftrade_product']?>
            </div>
            <div class="inner">
                <div class="card-in__date">Размещено <?=$card['ftrade_date']?></div>
                <input type="submit" class="button" value="Добавить в избранное" />
            </div>
        </div>
        <div class="inner">
            <div class="card-in__price text text--size-xl"><?=$card['ftrade_price']?> ₽</div>
        </div>
    </div>

    <div class="inner inner--flex inner--flex-between">
        <div class="card-in__gallery inner inner--flex inner--flex-center">
            <div><img src="<?=$card['ftrade_photo']?>" alt="photo item" /></div>
        </div>
        <div class="inner inner--flex inner--flex-column card-in__contacts">
            <input type="submit" class="button card-in__tel" value="Показать контакты продавца" />
            <a href="#" class="link link--black card-in__user-name"><?=$card['ftrade_user']?></a>
            <div class="card-in__user-adress"><?=$card['ftrade_city']?></div>
        </div>
    </div>

    <div class="inner card-in__description">
        <p><?=$card['ftrade_description']?></p>
        <a class="link link--black" href="/"><-- Вернуться на главную</a>
    </div>

</div>