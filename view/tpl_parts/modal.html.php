<div id="addFastProduct" class="modal">
    <div class="modal__content">
        <span data-modal="addFastProduct" class="modal__btn"></span>
        <form enctype="multipart/form-data" method="post" class="form">
            <div class="form__caption text text--title-s">Разместить объявление</div>
<!--            <div class="inner inner--mb-18">-->
<!--                <div class="form__title text text--size-s">Введите ваше имя</div>-->
<!--                <input name="form_name" type="text" class="form__input"/>-->
<!--            </div>-->
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">Контактный телефон</div>
                <input name="form_tel" type="text" class="form__input"/>
            </div>
<!--            <div class="inner inner--mb-18">-->
<!--                <div class="form__title text text--size-s">Введите город</div>-->
<!--                <input name="form_city" type="text" class="form__input"/>-->
<!--            </div>-->
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">Категория товара</div>
                <select class="form__select">
                    <option class="form__option">Выберите категорию</option>
                </select>
            </div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">Название</div>
                <input name="form_product" type="text" class="form__input"/>
            </div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">Описание</div>
                <input name="form_description" type="text" class="form__input"/>
            </div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">Цена</div>
                <input name="form_price" type="text" class="form__input"/>
            </div>
            <div class="inner inner--mb-18">
                <div class="form__title text text--size-s">Загрузите до 5 фотографий товара</div>
                <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
                <label class="button">
                    <input class="form__file-input" style="visibility: hidden;" name="form_file" type="file" multiple /><span class="">Загрузить файл</span>
                </label>
            </div>
            <div class="inner inner--text-center">
                <input type="submit" id="btnAddFastProducts" class="button" value="Разместить объявление">
            </div>
        </form>
    </div>
</div>