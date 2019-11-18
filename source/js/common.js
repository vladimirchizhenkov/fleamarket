window.onload = function () {
    let modals             = document.querySelectorAll('.link--modal');
    let closeBtnModal      = document.querySelectorAll('.modal__btn');
    let btnAddFastProducts = document.querySelector('#btnAddFastProducts');

    function showModal() {
        let tagBody         = document.querySelector('body');
        let getDataAttr     = this.getAttribute('data-modal');
        let getCurrentModal = document.querySelector('#' + getDataAttr);

        tagBody.classList.add('no-scroll');
        getCurrentModal.classList.add('modal--show');
    }

    function closeModal() {
        let tagBody         = document.querySelector('body');
        let getDataAttr     = this.getAttribute('data-modal');
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

    let fileTest = document.querySelector('input[name="form_file"]');

    fileTest.onchange = function () {
        if (this.value !== undefined || this.value !== '') {
            console.log(this.value);
        }
    };

};
