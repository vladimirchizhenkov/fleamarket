let errorNotes = {
    "basically": ['Поле не должно быть пустым'],
    "title": ['Название длина названия товара 2 символа'],
    "tel": ['Минимальное значение 5 символов', 'Телефон должен содержать только цифры'],
    "city": ['Минимальное значение 2 символа']
};

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