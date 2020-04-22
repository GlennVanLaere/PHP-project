let emailInput = document.querySelector("#exampleInputEmail1");

if(emailInput){
    emailInput.addEventListener("blur", () => {
        console.log("blur");
        checkEmail();
    });
}

function checkEmail(){} {
    let formData = new FormData();

    fetch('ajax/checkEmail.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        location.reload();
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}