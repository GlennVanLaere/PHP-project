let emailInputB = document.querySelector("#exampleInputEmail1");
let registerButton = document.querySelector("#registerSubmit").addEventListener("click", ()=>{
    sendEmail();
});
function sendEmail(){
    let formData = new FormData();
    let emailB = emailInputB.value;
    formData.append('email', emailB);
    fetch('ajax/registration.php', {
        method:'POST',
        body: formData
    })
    .then((Response) => Response.json())
    .then((result) => {
        console.log(result['receiver'])
        location.reload();
    })
    .catch((error) => {
        console.error('Error', error);
    })
}



