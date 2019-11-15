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

function getResponseFastProduct() {
    console.log('test response 200 OK');
}

// AJAX-запрос на отправку данных с формы размещения быстрого объявления
let btnFastProduct = document.querySelector('#btnAddFastProducts');
btnFastProduct.onclick = function (e) {
    e.preventDefault();

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

    console.log(ajax('/addFastProduct/addFastProduct', 'post', getResponseFastProduct, data));
};