import * as common from '/source/js/common.js';

// AJAX-функции и запросы
function requestData(dataArray) {
    let out = '';
    for (let key in dataArray) {
        out += `${key}=${dataArray[key]}&`
    }
    return out;
}

// Основная AJAX-функция
function ajax(url, method, functionName, dataArray = {}, sendFile = false, formFiles) {
    let xhttp = new XMLHttpRequest();
    xhttp.open(method, url, true);

    if (sendFile === true) {
        let formData = new FormData();

        console.log(formFiles);

        for (const file of formFiles.files) {
            formData.append("uploadFiles[]", file);
        }

        xhttp.send(formData);
    } else {
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(requestData(dataArray));
    }

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            functionName();
        }
    }
}

// Эта функция отработает, если получим в ответе статус 200
function getFormLoadResponse() {
    console.log('test response 200 OK');
}

// AJAX-запрос на отправку данных с формы размещения быстрого объявления
let btnFastProduct = document.querySelector('#btnAddFastProducts');
btnFastProduct.onclick = function (e) {
    e.preventDefault();

    // Получение данных из инпутов формы
    let formName        = document.querySelector('input[name="form_name"]').value;
    let formTel         = document.querySelector('input[name="form_tel"]').value;
    let formCity        = document.querySelector('input[name="form_city"]').value;
    let formProduct     = document.querySelector('input[name="form_product"]').value;
    let formDescription = document.querySelector('input[name="form_description"]').value;
    let formPrice       = document.querySelector('input[name="form_price"]').value;

    let formFiles       = document.querySelector('input[name="form_file"]');

    // let formFile2       = document.querySelector('input[name="form_file"]').files[1].name;
    // let formFile3       = document.querySelector('input[name="form_file"]').files[2].name;

    let data = {
        "form_name": formName,
        "form_tel": formTel,
        "form_city": formCity,
        "form_product": formProduct,
        "form_description": formDescription,
        "form_price": formPrice
    };

    ajax('/addFastProduct/addFastProduct', 'post', getFormLoadResponse, data, true, formFiles);
    common.clearInputsValue();
};