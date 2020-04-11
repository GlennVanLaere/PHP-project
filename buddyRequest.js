let buttons = document.querySelectorAll("#btnSendRequest");

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", () => {
        let buddy = buttons[i].dataset.buddy;
        sendRequest(buddy);
  });
}

function sendRequest(buddy) {
    console.log(buddy);
}