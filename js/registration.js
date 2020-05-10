let registerButton = document.querySelector("#registerSubmit").addEventListener("click", sendEmail());

function sendEmail(){
    console.log("clicked");
    let formData = new FormData();

    fetch('ajax/registration.php', {
        method:'POST',
        body: formData
    })
    .then((Response) => Response.json())
    .then((result) => {
        location.reload();
    })
    .catch((error) => {
        console.error('Error', error);
    })
}



