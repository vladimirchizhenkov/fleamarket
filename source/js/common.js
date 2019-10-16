window.onload = function () {

    let modals = document.querySelectorAll('.link--modal');
    let closeBtnModal = document.querySelectorAll('.modal__btn');
    let btnAddFastProducts = document.querySelector('#btnAddFastProducts');

    // Объект с массивами ошибок для валидации

    let errorNotes = {
      "basically": ['Поле не должно быть пустым'],
      "title" : ['Название длина названия товара 2 символа'],
      "tel" : ['Минимальное значение 5 символов', 'Телефон должен содержать только цифры'],
      "city" : ['Минимальное значение 2 символа']
    };

    function ajax(url, method, functionName, dataArray) {
        let xhttp = new XMLHttpRequest();

        xhttp.open(method, url, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(dataArray);

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                functionName(this);
            }
        };

        function requestData(dataArr) {
            let out = '';
            for (let key in dataArr) {
                out += `${key}=${dataArr[key]}&`
            }
        }
    }

    function validateEmpty() {
        if (this.value === null || undefined) {
            console.log('empty');
            return false;
        } else {
            return true;
        }
    }

    function validateMinWidth() {
        if (this.value.length < 2) {
            console.log('min width not validate');
            return false;
        } else {
            return true
        }
    }

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

    function requestData(dataArr) {
        let out = '';
        for (let key in dataArr) {
            out += `${key}=${dataArr[key]}&`
        }
        return out;
    }

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



    };

};
