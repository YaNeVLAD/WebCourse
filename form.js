//работаем с id а не class
//!READY!вёрстку из js в html
//parseFile вызывается из eventListener
//!READY!статусы submit удалять всегда при выводе нового
//!READY!cтатусы в константы
function handleFormSubmit(event) {
    event.preventDefault();

    const data = new FormData(event.target);

    const formJSON = Object.fromEntries(data.entries());
    formJSON.image_url = document.querySelector(".form__previewBigImage").src;
    formJSON.author_url = document.querySelector(".photoBlock__uploadImage").src;
    formJSON.small_image_url = document.querySelector(".form__previewSmallImage").src;

    console.log(formJSON);
    sendRequest(formJSON);
}

function validateForm(e) {
    const
        form = e.target,
        fields = Array.from(form.elements);
    const submitResultParent = document.querySelector('.submitStatus');
    
    fields.forEach(i => {
        if (i.checkValidity()) {
            invalidDescRemove(i);
            i.classList.remove('invalid');
        }
        else {
            invalidDescAdd(i);
            i.classList.add('invalid');
        }
    });
    if (!form.checkValidity()) {
        e.preventDefault();
        e.stopImmediatePropagation();
        setStatus(submitResultParent, failStatus);
    } else {
        handleFormSubmit(e);
        setStatus(submitResultParent, okStatus);
    }
};

function invalidDescAdd(input) {
    parent = input.parentElement;
    if (parent.querySelector('.invalidDesc')) {
        return;
    }
    el = document.createElement("span");
    el.className = "invalidDesc";
    el.innerText = input.labels[0].innerText + " is required";
    parent.appendChild(el);
}

function invalidDescRemove(input) {
    parent = input.parentElement;
    el = parent.querySelector('.invalidDesc')
    if (el) {
        parent.removeChild(el);
    }
}

function sendRequest(data) {

    const endpoint = 'https://localhost/api';

    fetch(endpoint, {
        mode: 'no-cors',
        method: 'POST',
        body: JSON.stringify(data),
    })
        .then((json) =>
            console.log("response :- ", json))
        .then(function (response) {
            console.info('fetch()', response);
            return response;
        });
}
//перенести заготовку статуса из statusDiv, чтобы удалять единственный элемент
function setStatus(parent, status) {
    const okDiv = parent.children[0];
    const failDiv = parent.children[1];
    if (status == okStatus) {
        okDiv.classList.remove('hidden');
        failDiv.classList.add('hidden');
    } else {
        failDiv.classList.remove('hidden');
        okDiv.classList.add('hidden');
    }
}
//функцию вызывать из addEventListener('load');
//превью будут формироваться из id input
// input id = image_url    preview id = image_url_preview
// preview id = input id + '_preview'
function previewFile(id, previewStr, preview2Str) {
    createInput(id);
    const preview = document.querySelector(previewStr);
    const preview2 = document.querySelector(preview2Str);
    const file = document.getElementById(id).files[0];
    const reader = new FileReader();
    preview2.classList.remove('hidden');
    reader.addEventListener(
        "load",
        () => {
            preview.src = reader.result;
            if (preview2 != undefined) {
                preview2.src = reader.result;
            }
        }
    );

    if (file) {
        newSrc = reader.readAsDataURL(file);
    }
}
//вызываться через addEventListener('input')
function parseText(id, previewBigStr, previewSmallStr) {
    const textContent = document.getElementById(id).value;
    if (id == 'author_name') {
        textPlaceholder = document.querySelector(previewBigStr).innerText;
    } else {
        textPlaceholder = document.getElementById(id).placeholder;
    }
    const previewBig = document.querySelector(previewBigStr);
    if (previewSmallStr == undefined) {
        if (textContent == '') {
            previewBig.innerText = 'Enter author name';
            return;
        }
        previewBig.innerText = textContent;
        return;
    }
    const previewSmall = document.querySelector(previewSmallStr);
    if (textContent === '') {
        previewBig.innerText = textPlaceholder;
        previewSmall.innerText = textPlaceholder;
        return;
    }
    previewBig.innerText = textContent;
    previewSmall.innerText = textContent;
}

function createInput(elemId) {
    parent = document.getElementById(elemId).parentElement;
    parent.classList.add('hidden');
    if (elemId === 'image_url' || elemId === 'small_image_url') {
        newInput = parent.parentElement.parentElement.parentElement.querySelector('.loadedFile');
    } else {
        newInput = parent.parentElement.querySelector('.loadedFile');
    }
    newInput.classList.remove('hidden');
}
//создать ф-цию removeInput, которая вызывается при нажании кнопки Remove в newInput
//она будет искать input 
//inputEl = this.parentElement.parentElement.getElementsByTagName('input')[0]

const okStatus = 1;
const failStatus = 0;
const form = document.querySelector('form');
form.noValidate = true;
form.addEventListener('submit', validateForm);