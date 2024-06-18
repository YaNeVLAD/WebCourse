document.addEventListener('DOMContentLoaded', () => {
    const okStatus = 1;
    const failStatus = 0;

    const form = document.getElementById('form');
    const statusBlock = document.getElementById('status');
    const submitButton = document.getElementById('submit');
    form.noValidate = true;
    form.addEventListener("submit", validate);
    form.addEventListener('input', (event) => {
        if (event.target.type !== 'file') {
            if (event.target.value !== '') {
                event.target.classList.add('filled');
                event.target.classList.remove('empty');
            } else {
                event.target.classList.add('empty');
                event.target.classList.remove('filled')
            }
            if (event.target.type === 'text')
                parseText(event.target.id);
        } else {
            previewFile(event.target.id);
        }
    })

    window.onload = function generateColor() {
        const letters = temp.toLowerCase();

        if (!letters) return;

        const color = getColorFromLetters(letters);

        document.getElementById('color-box').style.backgroundColor = color;
        document.getElementById('avatar-letter').innerText = letters[0].toUpperCase();
    }

    function getLetterValue(letter, isModifier = false) {
        if (!letter) return 0;
        const letterIndex = letter.charCodeAt(0) - 'a'.charCodeAt(0);
        if (isModifier) {
            // Модификаторы от 0 до 50
            return Math.round((letterIndex / 25) * 50);
        } else {
            // Основной оттенок от 0 до 360
            return Math.round((letterIndex / 25) * 360);
        }
    }

    function getColorFromLetters(letters) {
        const hue = getLetterValue(letters.charAt(0));
        const hueModifier1 = getLetterValue(letters.charAt(1), true);
        const hueModifier2 = getLetterValue(letters.charAt(2), false);

        const modifiedHue = (hue + hueModifier1 - hueModifier2 + 360) % 360; 
        //HSL(hue, saturation,lightness)
        return `hsl(${modifiedHue}, 70%, 50%)`;
    }

    async function validate(e) {
        e.preventDefault();
        submitButton.setAttribute('disabled', 'disabled');
        const fields = Array.from(form.elements);

        for (const field of fields) {
            if (field.checkValidity()) {
                field.classList.remove('invalid');
                field.classList.add('valid');
                await removeErrorText(field);
            } else {
                field.classList.remove('valid');
                field.classList.add('invalid');
                await addErrorText(field);
            }
        }

        if (form.checkValidity()) {
            e.preventDefault()
            await handleFormSubmit(form);
            await changeStatus(statusBlock, okStatus);
        } else {
            e.preventDefault();
            await changeStatus(statusBlock, failStatus);
            submitButton.removeAttribute('disabled');
        }
    }

    async function addErrorText(element) {
        const parent = element.parentElement;
        const name = element.labels[0].innerText;
        if (parent.querySelector('.invalidDesc'))
            return
        let error = document.createElement('span');
        error.classList.add('invalidDesc');
        error.innerText = name + " is required";
        parent.appendChild(error);
    }

    async function removeErrorText(element) {
        const parent = element.parentElement;
        if (error = parent.querySelector('.invalidDesc')) {
            parent.removeChild(error);
        }
    }

    async function changeStatus(statusBlock, status) {
        if (status === 0) {
            statusBlock.children[status].classList.remove('hidden');
            statusBlock.children[status + 1].classList.add('hidden');
        } else {
            statusBlock.children[status].classList.remove('hidden');
            statusBlock.children[status - 1].classList.add('hidden');
        }
    }

    async function handleFormSubmit(form) {
        const formData = new FormData(form);

        const formObject = {};
        for (const [key, value] of formData.entries()) {
            if (key === 'author_url' || key === 'image_url' || key === 'small_image_url') {
                formObject[key] = await getBase64String(key);
            } else {
                formObject[key] = value;
            }
        }
        const jsonString = JSON.stringify(formObject, null, 2);

        console.log(jsonString);

        await sendRequest(jsonString);
    }

    async function getBase64String(key) {
        const file = document.getElementById(key).files[0];
        const reader = new FileReader();

        return new Promise((result) => {
            reader.onload = function (event) {
                result(event.target.result);
            };
            reader.readAsDataURL(file);
        });
    }

    async function sendRequest(data) {

        const endpoint = 'https://localhost/api';

        await fetch(endpoint, {
            mode: 'no-cors',
            method: 'POST',
            body: data,
        })
            .then((json) =>
                console.log("response :- ", json))
            .then(function (response) {
                console.info('fetch()', response);
                window.location.href = 'home';
            });
    }

    function previewFile(id) {
        createInput(id);
        const preview1 = document.getElementById(id + '_preview1');
        const preview2 = document.getElementById(id + '_preview2');
        preview1.classList.remove('hidden');
        preview2.classList.remove('hidden');
        const upload = document.getElementById(id + '_upload');
        upload.classList.add('hidden');
        const file = document.getElementById(id).files[0];
        const reader = new FileReader();
        reader.addEventListener(
            "load",
            () => {
                preview1.src = reader.result;
                if (preview2 !== undefined) {
                    preview2.src = reader.result;
                }
            }
        );
        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function createInput(elemId) {
        if (elemId !== 'author_url') {
            hint = document.getElementById(elemId + '_hint');
            hint.classList.add('hidden');
        }
        parent = document.getElementById(elemId);
        newInput = document.getElementById(elemId + '_new');
        parent.classList.add('hidden');

        newInput.classList.remove('hidden');
    }

    function parseText(id) {
        const elem = document.getElementById(id);
        const elemText = elem.value;
        if (id === 'author_name') {
            preview1 = document.getElementById(id + '_preview1');
            placeholder = 'Enter author name';
            if (elemText.length === 0) {
                preview1.innerText = placeholder;
            } else
                preview1.innerText = elemText;
        } else {
            preview1 = document.getElementById(id + '_preview1');
            preview2 = document.getElementById(id + '_preview2');
            placeholder = elem.placeholder;
            if (elemText.length === 0) {
                preview1.innerText = placeholder;
                preview2.innerText = placeholder;
            } else {
                preview1.innerText = elemText;
                preview2.innerText = elemText;
            }
        }
    }
});