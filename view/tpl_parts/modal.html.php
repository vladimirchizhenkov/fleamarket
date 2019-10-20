<div id="addFastProduct" class="modal">
    <div class="modal__back"></div>
    <div class="modal__content">
        <span data-modal="addFastProduct" class="modal__btn"></span>
        <form action="/addFastProduct/addFastProduct" method="post" class="form">
            <div class="form__caption text text--title-s">Разместить объявление</div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">
                    Введите ваше имя
                </div>
                <input name="form_name" type="text" class="form__input"/>
            </div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">
                    Введите Контактный телефон
                </div>
                <input name="form_tel" type="text" class="form__input"/>
            </div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">
                    Введите город
                </div>
                <input name="form_city" type="text" class="form__input"/>
            </div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">
                    Выберите категорию товара
                </div>
                <select class="form__select">
                    <option class="form__option">Выберите категорию</option>
                </select>
            </div>
            <div class="inner inner--mbroduct=&form_price=-18">
                <div class="form__title text text--size-s">
                    Введите название товара
                </div>
                <input name="form_product" type="text" class="form__input"/>
            </div>
            <div class="inner inner--mb-36">
                <div class="form__title text text--size-s">
                    Введите цену товара
                </div>
                <input name="form_price" type="text" class="form__input"/>
            </div>
            <div class="inner inner--text-center">
                <input type="submit" id="btnAddFastProducts" class="button" value="Разместить объявление">
            </div>
        </form>
    </div>
</div>