const form = document.getElementById('form');
const text = document.getElementById('text');
const phone = document.getElementById('phone');
const email = document.getElementById('email');


form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
    });

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const textValue = text.value.trim();
    const emailValue = email.value.trim();
    const phoneValue = phone.value.trim();

    if(textValue === "") {
        setError(text, "Поле 'Введите текст' не должно быть пустым");
    } else {
        setSuccess(text);
    }

    if(emailValue === '') {
        setError(email, "Поле 'Введите почту' не должно быть пустым");
    } else if (!isValidEmail(emailValue)) {
        setError(email, "Укажите правильный адрес электронной почты");
    } else {
        setSuccess(email);
    }

    if(phoneValue === '') {
        setError(phone, "Поле 'Введите номер телефона' не должно быть пустым");
    } else if (phoneValue.length < 9 ) {
        setError(phone, "Номер телефона должен содержать не менее 9 цифр")
    } else {
        setSuccess(phone);
    }


};
