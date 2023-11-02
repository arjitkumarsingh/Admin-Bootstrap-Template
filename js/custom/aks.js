function updateUser(id, name, email, password, role) {
    $("#users-tab").hide(1000);
    $("#update-user").show(1000);

    $("#update-user-form").attr("action", "../php/user-update.php?id=" + id);
    $("#update-id").html('<input class="form-control" type="id" name="id" value="' + id + '" readonly>');
    $("#name").attr("placeholder", name);
    $("#name").attr("value", name);
    $("#email").attr("placeholder", email);
    $("#email").attr("value", email);
    $("#password").attr("placeholder", "Valid password format");
    $("#password").attr("value", password);

    if (role == 1) {
        $("#role-1").prop("selected", true);
        $("#role-2").prop("selected", false);
    } else {
        $("#role-2").prop("selected", true);
        $("#role-1").prop("selected", false);
    }
}

$(document).ready(function () {

    // Seach in users details
    // let oldHtml = $("#users-details").html();
    // $("#search").on("keyup", function () {
    //     $search = $(this).val();
    //     if (!$search) {
    //         $("#users-details").html(oldHtml);
    //     } else {
    //         $.ajax({
    //             type: "post",
    //             data: {
    //                 search: $search
    //             },
    //             url: "../php/search.php",
    //             success: function (response) {
    //                 response = JSON.parse(response);
    //                 $("#users-details").html(
    //                     "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th></tr></thead><tbody></tbody>"
    //                 );
    //                 response.forEach(element => {
    //                     $("tbody").append(`<tr><td>${element.id}</td><td>${element.name}</td><td>${element.email}</td><td>${element.password}</td></tr>`);
    //                 });
    //             },
    //             error: function (response) {
    //                 console.error(response);
    //             }
    //         });
    //     }
    // });

    // show and hide password if user check and uncheck the checkbox
    $('#checkbox-password').change(function () {
        if ($(this).prop("checked")) {
            $("#password").attr("type", "text");
            $("#new-password").attr("type", "text");
            $("#label-password").text("Hide Password");
        } else {
            $("#password").attr("type", "password");
            $("#new-password").attr("type", "password");
            $("#label-password").text("Show Password");
        }
    });


    // start countdown for resending OTP
    let counter = 5;
    $('#timer').html(counter);

    let timerId = setInterval(() => {
        displayTimer();
    }, 1000);

    function displayTimer() {
        $('#timer-on').show();
        $("#timer").html(--counter);
        if (counter < 0) {
            clearInterval(timerId);
            $("#timer-off").show();
            $('#timer-on').hide();
        }
    }

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

    // name validation function
    function validateNewName() {
        let nameValue = $("#new-name").val();
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
    function validateNewEmail() {
        let emailValue = $("#new-email").val();
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
    function validateNewPassword() {
        let passwordValue = $("#new-password").val();
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



    // validate all input fields on submit signup form and profile form
    $("#signup-form, #update-user-form, #profile-form").on("submit", function () {
        isValidName = validateName();
        isValidEmail = validateEmail();
        isValidPassword = validatePassword();
        if (isValidName && isValidEmail && isValidPassword) {
            return true
        }
        return false;
    });

    // validate all input fields on submit new user form
    $("#new-user-form").on("submit", function () {
        isValidName = validateNewName();
        isValidEmail = validateNewEmail();
        isValidPassword = validateNewPassword();
        if (isValidName && isValidEmail && isValidPassword) {
            return true
        }
        return false;
    });




    // validate all input fields on submit signin form
    $("#signin-form").on("submit", function () {
        isValidEmail = validateEmail();
        isValidPassword = validatePassword();
        if (isValidEmail && isValidPassword) {
            return true
        } else {
            return false;
        }
    });

    // validate password recovery form
    $("#recovery-form").on("submit", function () {
        return validateEmail();
    });


    // hide and show users
    $("#users").on("click", function () {
        $("#overview-tab").hide(1000);
        $("#new-user").hide(1000);
        $("#update-user").hide(1000);
        $("#view-activity").hide(1000);
        $("#users-tab").show(1000);
    });
    $("#overview").on("click", function () {
        $("#users-tab").hide(1000);
        $("#new-user").hide(1000);
        $("#update-user").hide(1000);
        $("#view-activity").hide(1000);
        $("#overview-tab").show(1000);
    });

    // show save new user form on dashboard
    $("#add").on("click", function () {
        $("#users-tab").hide(1000);
        $("#new-user").show(1000);
    });
});