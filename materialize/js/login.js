document.forms['auth-form'].addEventListener('submit', submitHandler);

function submitHandler(e) {
  var form = e.target;
  var emailInput;
  var emailValue;
  var passwordInput;
  var passwordValue;
  var validationResult;

  emailInput = form.querySelector('[name=email]');
  emailValue = emailInput.value;
  passwordInput = form.querySelector('[name=password]');
  passwordValue = passwordInput.value;

  validationResult = validateData(emailValue, passwordValue);

  if (!validationResult.success) {
    e.preventDefault();
    cleanUpErrors(form);
    showErrors(form, validationResult.errors);
    return false;
  }

  function validateData(email, password) {
    var result = {
      success: true,
      errors: []
    };
    var validatePasswordResult;

    if (!validateEmail(email)) {
      result.success = false;
      result.errors.push({
        field: 'email',
        message: 'Adresse mail invalide'
      });
    }

    validatePasswordResult = validatePassword(password);

    if (!validatePasswordResult.success) {
      result.success = false;
      result.errors.push({
        field: 'password',
        message: validatePasswordResult.message
      });
    }

    return result;

    function validatePassword(password) {
      var result = {
        success: true,
        message: ''
      };
      
      if (password.length < 3) {
        return {
          success: false,
          message: 'Votre mot de passe doit avoir au minimum 3 caractères !'
        };
      }

      return result;
    }

    function validateEmail(email) {
      var regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return regEx.test(email);
    }
  }

  function cleanUpErrors(form) {
    var errorMessages;
    var i;
    var invalidFields;
    
    invalidFields = form.querySelectorAll(
      '.${invalidClass}'.replace('${invalidClass}', 'invalid')
    );
    
    for (i = 0; i < invalidFields.length; i++) {
      invalidFields[i].className = invalidFields[i].className.replace('invalid', '');
    }

    errorMessages = form.querySelectorAll(
      '.${errorClass}'.replace('${errorClass}', 'error-message')
    );

    for (i = 0; i < errorMessages.length; i++) {
      errorMessages[i].remove();
    }
  }

  function showErrors(form, errors) {
    var i;

    for (i = 0; i < errors.length; i++) {
      showError(form, errors[i]);
    }

    function showError(form, error) {
      var input;
      var errorEl;

      input = form.querySelector('[name=${inputName}]'.replace('${inputName}', error.field));
      errorEl = getErrorElement(error.message);
      input.parentNode.className += ' invalid';

      insertMessage(errorEl, input);      

      function insertMessage(newElement, targetElement) {
        targetElement.parentNode.appendChild(newElement);
      }

      function getErrorElement(message) {
        var errorEl;

        errorEl = document.createElement('span');
        errorEl.innerText = message;
        errorEl.className = 'error-message';

        return errorEl;
      }
    }
  }
}