let buttons = document.querySelectorAll("#btnSendRequest");

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", () => {
        let buddy = buttons[i].dataset.buddy;
        sendRequest(buddy);
  });
}

function sendRequest(buddy) {
    let formData = new FormData();

    formData.append('receiver', buddy);

    fetch('ajax/sendRequest.php', {
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