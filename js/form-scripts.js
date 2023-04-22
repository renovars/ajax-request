document.querySelector("#sendForm").onclick = function()
{
    let name           = document.getElementById("inputName").value;
    let surname        = document.getElementById("inputSurname").value;
    let email          = document.getElementById("inputEmail").value;
    let password       = document.getElementById("inputPassword").value;
    let repeatPassword = document.getElementById("inputRepeatPassword").value;

    let params = new URLSearchParams();
    params.set('name', name);
    params.set('surname', surname);
    params.set('email', email);
    params.set('password', password);
    params.set('repeatPassword', repeatPassword);

    fetch('php/form-process.php', {
    method: 'POST',
    body: params
    }).then(response => response.text())
        .then(data => {
            if (data === "success"){
                $("#registrationForm").hide();
                $("#successRegistration").removeClass('invisible');
            } else {
                alert(data);
            }});
};