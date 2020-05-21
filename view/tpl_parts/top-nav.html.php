<div class="main-nav">
    <div class="container">

        <div class="inner inner--flex inner--flex-between">

            <div class="inner">
                <a href="/" class="logo">
                    <img class="logo__image" src="/source/img/static/logotype.png" alt="main logo"/>
                </a>
            </div>

            <div class="inner inner--flex inner--flex-middle">

                <a href="#" class="link link--burger link--mr-20"></a>

                <form class="search-panel">
                    <select class="search-panel__select search-panel__select--br" name="" id="">

                        <?php foreach ($categories as $category):?>
                        <option value="<?=$category['id']?>"><?=$category['category_name']?></option>
                        <?php endforeach; ?>

                    </select>
                    <input class="search-panel__input search-panel__input--br" placeholder="Поиск по объявлениям"/>
<!--                    <select class="search-panel__select search-panel__select--br" name="" id="">-->
<!--                        <option>cities</option>-->
<!--                    </select>-->
                    <input class="search-panel__input search-panel__input--btn" type="button" value="Найти"/>
                </form>

            </div>
        </div>
    </div>
</div>