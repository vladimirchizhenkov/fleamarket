window.onload = function () {

    let modals = document.querySelectorAll('.link--modal');
    let closeBtnModal = document.querySelectorAll('.modal__btn');
    let btnAddFastProducts = document.querySelector('#btnAddFastProducts');

    function showModal() {
        let getDataAttr = this.getAttribute('data-modal');
        let getCurrentModal = document.querySelector('#' + getDataAttr);
        getCurrentModal.classList.add('modal--show');
    }

    function closeModal() {
        let getDataAttr = this.getAttribute('data-modal');
        let getCurrentModal = document.querySelector('#' + getDataAttr);
        getCurrentModal.classList.remove('modal--show');
    }

    modals.forEach(function (modal) {
        modal.onclick = showModal;
    });

    closeBtnModal.forEach(function (btn) {
        btn.onclick = closeModal;
    });

    btnAddFastProducts.onclick = function (event) {
        event.preventDefault();
        let parentFormElement = this.form.closest('.form');
        let inputName = parentFormElement.querySelector('.form__input[name="form_name"]').value;
        let inputTel = parentFormElement.querySelector('.form__input[name="form_tel"]').value;
        let inputCity = parentFormElement.querySelector('.form__input[name="form_city"]').value;
        let inputProductName = parentFormElement.querySelector('.form__input[name="form_product"]').value;
        let inputPrice = parentFormElement.querySelector('.form__input[name="form_price"]').value;

        let data = {
            "name": inputName,
            "tel": inputTel,
            "city": inputCity,
            "productName": inputProductName,
            "price": inputPrice
        };

        ajax('/controller/testajax.php', 'POST', login, data);

        function login(result) {
            console.log(result);
        }
    };

};
