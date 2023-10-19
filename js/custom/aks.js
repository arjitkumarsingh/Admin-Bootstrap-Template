$(document).ready(function () {

    // show and hide password if user check and uncheck the checkbox
    $('#checkbox-password').change(function () {
        if ($(this).prop("checked")) {
            $("#password").attr("type", "text");
            $("#label-password").text("Hide Password");
        } else {
            $("#password").attr("type", "password");
            $("#label-password").text("Show Password");
        }
    });

    // invoking name validation function on interaction with name input field
    $("#name").on("keyup blur", function () {
        validateName();
    });
    // invoking email validation function on interaction with email input field
    $("#email").on("keyup blur", function () {
        validateEmail();
    });
    // invoking password validation function on interaction with password input field
    $("#password").on("keyup blur", function () {
        validatePassword();
    });

    // toastr (notification) configurations
    toastrOptions = {
        closeButton: true,
        progressBar: true,
        preventDuplicates: true,
        // positionClass: "toast-bottom-center"
    }

    // name validation function
    function validateName() {
        let nameValue = $("#name").val();
        let regex = /^[a-zA-Z-' ]*$/;
        if (nameValue.length == 0) {
            toastr.error('name is required', "*Name", toastrOptions);
            return false;
        } else if (nameValue.length < 3) {
            toastr.error('name must be at least 3 characters long', "*Name", toastrOptions);
            return false;
        } else if (!regex.test(nameValue)) {
            toastr.error('only letters and white space allowed', "*Name", toastrOptions);
            return false;
        } else {
            return true;
        }
    }

    // email validation function
    function validateEmail() {
        let emailValue = $("#email").val();
        let regex = /^[a-zA-Z][a-zA-Z\d\w.]{2,30}@[a-zA-Z\d]{3,30}\.[a-zA-Z]{2,20}$/;
        if (emailValue.length == "") {
            toastr.error('email is required', "*Email", toastrOptions);
            return false;
        } else if (!regex.test(emailValue)) {
            toastr.error('invalid email format', "*Email", toastrOptions);
            return false;
        } else {
            return true;
        }
    }

    // password validation function
    function validatePassword() {
        let passwordValue = $("#password").val();
        let regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (passwordValue.length == "") {
            toastr.error('password is required', "*Password", toastrOptions);
            return false;
        } else if (!regex.test(passwordValue)) {
            toastr.error('password must be a combination of symbol(!@#$%^&*), number, upper & lower case letter and minimum 8 characters long',
                        "*Password", toastrOptions);
            return false;
        } else {
            return true;
        }
    }

    // validate all input fields on submit and change event for signup form
    $("#signup-form").on("submit change", function () {
        isValidName = validateName();
        isValidEmail = validateEmail();
        isValidPassword = validatePassword();
        if (isValidName && isValidEmail && isValidPassword) {
            $("#submit").prop("disabled", false);
            return true
        }
        $("#submit").prop("disabled", true);
        return false;
    });

    // validate all input fields on submit and change event for signin form
    $("#signin-form").on("submit change", function () {
        isValidEmail = validateEmail();
        isValidPassword = validatePassword();
        if (isValidEmail && isValidPassword) {
            $("#submit").prop("disabled", false);
            return true
        } else {
            $("#submit").prop("disabled", true);
            return false;
        }
    });

});