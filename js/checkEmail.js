let emailInput = document.querySelector("#exampleInputEmail1");

if(emailInput){
    emailInput.addEventListener("blur", () => {
        console.log("blur");
        checkEmail();
    });
}

function checkEmail(){} {
    let formData = new FormData();
    let email = emailInput.value;
    fetch('ajax/checkEmail.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        let available = document.querySelector("#available");
        available.innerHTML = result["available"];
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}