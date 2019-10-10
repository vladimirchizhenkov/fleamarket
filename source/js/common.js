window.onload = function () {

    let modals = document.querySelectorAll('.link--modal');
    let closeBtnModal = document.querySelectorAll('.modal__btn');

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
};
