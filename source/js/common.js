window.onload = function () {

    let modals = document.querySelectorAll('.link--modal');
    let closeBtnModal = document.querySelectorAll('.modal__btn');
    let btnAddFastProducts = document.querySelector('#btnAddFastProducts');

    function showModal() {
        let tagBody = document.querySelector('body');
        let getDataAttr = this.getAttribute('data-modal');
        let getCurrentModal = document.querySelector('#' + getDataAttr);

        tagBody.classList.add('no-scroll');
        getCurrentModal.classList.add('modal--show');
    }

    function closeModal() {
        let tagBody = document.querySelector('body');
        let getDataAttr = this.getAttribute('data-modal');
        let getCurrentModal = document.querySelector('#' + getDataAttr);

        getCurrentModal.classList.remove('modal--show');
        tagBody.classList.remove('no-scroll');
    }

    modals.forEach(function (modal) {
        modal.onclick = showModal;
    });

    closeBtnModal.forEach(function (btn) {
        btn.onclick = closeModal;
    });

    // Блок функций работы с формами

    // Функция очистки инпутов после закрытия окна или успешной отправки формы
    function clearInputsValue() {
        let allInputs = document.querySelectorAll('input');
        allInputs.forEach(function (el) {
            if (!el.classList.contains('button')) {
                el.value = '';
            }
        });
    }

    let fileTest = document.querySelector('input[name="form_file"]');
    // Здесь будет функция обработки файлов из input type=file
    // Здесь будет функция удаления файла из file list

    fileTest.onchange = function () {
        if (this.value !== undefined || this.value !== '') {
            // Находим родительский элемент инпута file
            let parentElement = this.parentElement;

            // Создаем новый Div под названия загруженных файлов
            let fileNameField = document.createElement("div");
            fileNameField.classList.add('form__file-field');

            // Вставляем этот Div сразу после Label
            parentElement.after(fileNameField);
            fileNameField.innerHTML = this.value;
        }
    };

    // AJAX-функции и запросы
    function requestData(dataArray) {
        let out = '';
        for (let key in dataArray) {
            out += `${key}=${dataArray[key]}&`
        }
        return out;
    }

    function ajax(url, method, functionName, dataArray) {
        let xhttp = new XMLHttpRequest();

        xhttp.open(method, url, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(requestData(dataArray));

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                functionName();
            }
        }
    }


    // Эта функция отработает, если получим в ответе статус 200
    function getResponseFastProduct() {
        console.log('test response 200 OK');
    }

    // AJAX-запрос на отправку данных с формы размещения быстрого объявления
    let btnFastProduct = document.querySelector('#btnAddFastProducts');
    btnFastProduct.onclick = function (e) {
        e.preventDefault();

        // Получение данных из инпутов формы
        let formName = document.querySelector('input[name="form_name"]').value;
        let formTel = document.querySelector('input[name="form_tel"]').value;
        let formCity = document.querySelector('input[name="form_city"]').value;
        let formProduct = document.querySelector('input[name="form_product"]').value;
        let formDescription = document.querySelector('input[name="form_description"]').value;
        let formPrice = document.querySelector('input[name="form_price"]').value;
        let formFile = document.querySelector('input[name="form_file"]').value;

        let data = {
            "form_name": formName,
            "form_tel": formTel,
            "form_city": formCity,
            "form_product": formProduct,
            "form_description": formDescription,
            "form_price": formPrice,
            "form_photo": formFile
        };

        ajax('/addFastProduct/addFastProduct', 'post', getResponseFastProduct, data);
        clearInputsValue();
    };
};


