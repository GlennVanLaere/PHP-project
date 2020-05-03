let reportButton = document.querySelector("#buttonReport");

reportButton.addEventListener("click", (e) => {
    e.preventDefault();
    report();
});

function report() {
    let formData = new FormData();
    let reason = document.querySelector("#reason").value;
    let verbalAbuse = false;
    let hateSpeech = false;

    if (document.querySelector("#verbalAbuse").checked) {
        verbalAbuse = true;
    }

    if (document.querySelector("#hateSpeech").checked) {
        hateSpeech = true;
    }

    formData.append('reason', reason);
    formData.append('verbalAbuse', verbalAbuse);
    formData.append('hateSpeech', hateSpeech);

    fetch('ajax/sendReport.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        window.location = "match.php";
    })
    .catch(error => {
        console.error('Error:', error);
    });
}