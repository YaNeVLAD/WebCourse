document.addEventListener('DOMContentLoaded', () => {
    const okStatus = 'ok';
    const minPasswordLenght = 5;
    const failUserStatus = 'UserFail';
    const failServerStatus = 'ServerFail';
    form.noValidate = true;

    const icon = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const submitButton = document.getElementById("submit");
    const submitResultParent = document.getElementById('result');
    const failServerDiv = submitResultParent.children[0];
    const failUserDiv = submitResultParent.children[1];

    form.addEventListener('submit', async function (event) {
        event.preventDefault();
        const form = document.getElementById(event.target.id);
        submitButton.setAttribute('disabled', 'disabled');

        if (!validateForm(form)) {
            await setStatus(failUserStatus);
            submitButton.removeAttribute('disabled');
            return;
        }

        const data = new FormData(event.target);

        const formJSON = Object.fromEntries(data.entries());

        await sendRequest(formJSON);
    });

    function validateForm(form) {
        state = true;
        formFields = Array.from(form.elements);
        if (!isValidEmail(formFields[0].value)) {
            (formFields[0].value.length === 0)
                ? invalidDescAdd(formFields[0], "Email is required.")
                : invalidDescAdd(formFields[0], "Incorrect email format. Correct format is ****@**.***");
            state = false;
        } else {
            invalidDescRemove(formFields[0]);
        }
        if (formFields[1].value.length < minPasswordLenght) {
            (formFields[1].value.length === 0)
                ? invalidDescAdd(formFields[1], "Password is required.")
                : invalidDescAdd(formFields[1], "Password is too short, must be at least " + minPasswordLenght + " symbols");
            state = false;
        } else {
            invalidDescRemove(formFields[1]);
        }
        if (state) {
            return true;
        } else {
            return false;
        }
    }

    function isValidEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._%+-]{3,}@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    async function setStatus(status) {
        switch (status) {
            case failServerStatus:
                // SET STATUS
                failUserDiv.classList.remove('active');
                failUserDiv.children[0].classList.remove('active');
                failUserDiv.children[1].classList.remove('active');
                failUserDiv.children[1].innerText = '';
                // REMOVE STATUS
                setTimeout(() => {
                    failServerDiv.classList.add('active');
                    failServerDiv.children[0].classList.add('active');
                    failServerDiv.children[1].classList.add('active');
                    failServerDiv.children[1].innerText = 'Email or password is incorrect.';
                    setFailFormStatus('form');
                }, 400);

                break;
            case failUserStatus:
                // SET STATUS
                failServerDiv.classList.remove('active');
                failServerDiv.children[0].classList.remove('active');
                failServerDiv.children[1].classList.remove('active');
                failServerDiv.children[1].innerText = '';
                // REMOVE STATUS
                setTimeout(() => {
                    failUserDiv.classList.add('active');
                    failUserDiv.children[0].classList.add('active');
                    failUserDiv.children[1].classList.add('active');
                    failUserDiv.children[1].innerText = 'A-Ah! Check all fields,';
                }, 400);

                break;
            default:
                failServerDiv.classList.remove('active');
                failServerDiv.children[0].classList.remove('active');
                failServerDiv.children[1].classList.remove('active');
                failServerDiv.children[1].innerText = '';

                failUserDiv.classList.remove('active');
                failUserDiv.children[0].classList.remove('active');
                failUserDiv.children[1].classList.remove('active');
                failUserDiv.children[1].innerText = '';
                break;
        }
    }

    function setFailFormStatus(formId) {
        form = document.getElementById(formId);
        formFields = Array.from(form.elements);
        formFields.forEach(element => {
            invalidDescAdd(element, '');
        });
    }

    function invalidDescAdd(input, descText) {
        parent = input.parentElement;
        input.classList.add('invalid');
        if (prevDesc = parent.querySelector('.invalidDesc')) {
            invalidDescRemove(prevDesc);
        }
        el = document.createElement("span");
        el.className = "invalidDesc";
        el.innerText = descText;
        parent.appendChild(el);
    }

    function invalidDescRemove(input) {
        parent = input.parentElement;
        input.classList.remove('invalid');
        el = parent.querySelector('.invalidDesc')
        if (el) {
            parent.removeChild(el);
        }
    }

    async function sendRequest(data) {

        const endpoint = 'https://localhost/api/login';

        await fetch(endpoint, {
            method: 'POST',
            body: JSON.stringify(data),
        })
            .then((responce) => {
                if (responce.status === 200) {
                    setStatus(okStatus);
                    window.location.href = 'admin';
                } else {
                    setStatus(failServerStatus);
                    submitButton.removeAttribute('disabled');
                }
            });
    }

    icon.addEventListener('click', function () {
        if (password.type === "password") {
            password.type = "text";
            icon.classList.add("shown-pass");
            icon.classList.remove("hidden-pass");
        }
        else {
            password.type = "password";
            icon.classList.add("hidden-pass");
            icon.classList.remove("shown-pass");
        }
    });

    document.addEventListener('input', function (event) {
        input = document.getElementById(event.target.id);
        if ((input.value.length) > 0) {
            input.classList.add("filled");
            input.classList.remove("empty");
            return;
        }
        input.classList.add("empty");
        input.classList.remove("filled");
    });
});
