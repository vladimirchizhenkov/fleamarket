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
export function clearInputsValue() {
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




