import * as common from '/source/js/common.js';

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
    xhttp.setRequestHeader("Content-type", "multipart/form-data");
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

// Обрабатываем полученные файлы из формы размещения быстрого объявления
let formFileBtn     = document.querySelector('input[name="form_file"]');
formFileBtn.addEventListener('change', function () {
    let file_1 = this.files[0];
    let file_2 = this.files[1];
    let file_3 = this.files[2];

    console.log(file_1, file_2, file_3);
});

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
    let formFile        = document.querySelector('input[name="form_file"]').value;

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
    common.clearInputsValue();
};