const nameEL = document.querySelector('#name');
const lastnameEL = document.querySelector('#lastname');
const genderEL1 = document.querySelector('#gender1');
const genderEL2 = document.querySelector('#gender2');
const genderEL3 = document.querySelector('#gender3');
const emailEL = document.querySelector('#email');
const countryEL = document.querySelector('#country');
const subjectEL = document.querySelector('#subject');
const textareaEL = document.querySelector('#textarea');

const form = document.querySelector('#signup');

 // min in the input, max in the input
const min = 3,
max = 25;



//returns true if the input argument is empty
const isRequired = value => value === '' ? false : true;

//returns false if the length argumet is not between the min and max argument
const isBetween = (length, min, max) => length < min || length > max ? false : true;

// check if email is valid with regular expression
const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};


// highlights the border of the input field and displays an error message if the input field is invalid
const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}

// check name
const checkName = () => {
    let valid = false;
    const name = nameEL.value.trim();

    if (!isRequired(name)) {
        showError(nameEL, 'Name cannot be blank.');
    } else if (!isBetween(name.length, min, max)) {
        showError(nameEL, `Name must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(nameEL);
        valid = true;
    }
    return valid;
}

// check lastname
const checkLastmame = () => {
    let valid = false;
    const lastname = lastnameEL.value.trim();

    if (!isRequired(lastname)) {
        showError(lastnameEL, 'Lastname cannot be blank.');
    } else if (!isBetween(lastname.length, min, max)) {
        showError(lastnameEL, `Lastname must be between ${min} and ${max} characters.`)
    } else {
        showSuccess(lastnameEL);
        valid = true;
    }
    return valid;
}

// check gender
const checkGender = () => {
    let valid = false;
    if (!(genderEL1.checked) && !(genderEL2.checked) && !(genderEL3.checked)) {
        showError(genderEL1, 'Gender cannot be blank.');
    } else {
        valid = true;
    }
    return valid;
}


// check email
const checkEmail = () => {
    let valid = false;
    const email = emailEL.value.trim();
    if (!isRequired(email)) {
        showError(emailEL, 'Email cannot be blank.');
    } else if (!isEmailValid(email)) {
        showError(emailEL, 'Email is not valid.')
    } else {
        showSuccess(emailEL);
        valid = true;
    }
    return valid;
}

// check country
const checkCountry = () => {
    let valid = false;

    if (!isRequired(countryEL.value)) {
        showError(countryEL, 'Choose one contry.');
    } else {
        showSuccess(countryEL);
        valid = true;
    }
    return valid;
}


// check subject
const checkSubject = () => {
    let valid = false;
    if (!isRequired(subjectEL.value)) {
        showError(subjectEL, 'Choose one subject.');
    } else {
        showSuccess(subjectEL);
        valid = true;
    }
    return valid;
}


// check textArea
const checkTextarea = () => {
    let valid = false;
    const textarea = textareaEL.value.trim();
    if (!isRequired(textarea)) {
        showError(textareaEL, 'Your message cannot be blank.');
    } else if (!isBetween(textarea.length, 20, 400)) {
        showError(textareaEL, `Your message must be between 20 and 400 characters.`)
    } else {
        showSuccess(textareaEL);
        valid = true;
    }
    return valid;
}

form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate forms
    let isNameValid = checkName(),
        isLastmameValid = checkLastmame(),
        isGenderValid = checkGender(),
        isEmailValid = checkEmail(),
        isCountryValid = checkCountry(),
        isSubjectValid = checkSubject(),
        isTextareaValid = checkTextarea();

    let isFormValid = isNameValid &&
        isLastmameValid &&
        isGenderValid &&
        isEmailValid &&
        isCountryValid &&
        isSubjectValid &&
        isTextareaValid;

    // submit to the server if the form is valid
    if (isFormValid) {
        form.submit();
    }
});


// add some delay before checking
const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

// add an ionstant feedback
form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'name':
            checkName();
            break;
        case 'lastname':
            checkLastmame();
            break;
        case 'email':
            checkEmail();
            break;
        case 'country':
            checkCountry();
            break;
        case 'subject':
            checkSubject();
            break;
        case 'textarea':
            checkTextarea();
            break;
    }
}));


// const checkPassword = () => {

//     let valid = false;

//     const password = passwordEl.value.trim();

//     if (!isRequired(password)) {
//         showError(passwordEl, 'Password cannot be blank.');
//     } else if (!isPasswordSecure(password)) {
//         showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
//     } else {
//         showSuccess(passwordEl);
//         valid = true;
//     }

//     return valid;
// };


// const checkConfirmPassword = () => {
//     let valid = false;
//     // check confirm password
//     const confirmPassword = confirmPasswordEl.value.trim();
//     const password = passwordEl.value.trim();

//     if (!isRequired(confirmPassword)) {
//         showError(confirmPasswordEl, 'Please enter the password again');
//     } else if (password !== confirmPassword) {
//         showError(confirmPasswordEl, 'Confirm password does not match');
//     } else {
//         showSuccess(confirmPasswordEl);
//         valid = true;
//     }

//     return valid;
// };