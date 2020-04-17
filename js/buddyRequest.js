let buttonsSendRequest = document.querySelectorAll("#btnSendRequest");

for (let i = 0; i <  buttonsSendRequest.length; i++) {
    buttonsSendRequest[i].addEventListener("click", () => {
        let buddy =  buttonsSendRequest[i].dataset.buddy;
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

let cancelButton = document.querySelector("#btnCancelRequest");

if(cancelButton){
    cancelButton.addEventListener("click", () => {
        cancelRequest();
    });
}

function cancelRequest() {
    let formData = new FormData();

    fetch('ajax/cancelRequest.php', {
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

let removeButton = document.querySelectorAll("#btnRemoveBuddy");

for (let i = 0; i <  removeButton.length; i++) {
    removeButton[i].addEventListener("click", () => {
        let buddy =  removeButton[i].dataset.buddy;
        removeBuddy(buddy);
  });
}

function removeBuddy(buddy) {
    let formData = new FormData();

    formData.append('receiver', buddy);

    fetch('ajax/removeBuddy.php', {
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

let acceptButton = document.querySelectorAll("#btnAcceptRequest");

for (let i = 0; i <  acceptButton.length; i++) {
    acceptButton[i].addEventListener("click", () => {
        let buddy =  acceptButton[i].dataset.buddy;
        acceptRequest(buddy);
  });
}

function acceptRequest(buddy) {
    let formData = new FormData();

    formData.append('receiver', buddy);

    fetch('ajax/acceptRequest.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        ignoreRequest(buddy, "");
        location.reload();
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}

let ignoreButton = document.querySelectorAll("#btnIgnoreRequest");

for (let i = 0; i <  ignoreButton.length; i++) {
    ignoreButton[i].addEventListener("click", () => {
        let buddy =  ignoreButton[i].dataset.buddy;
        let textareas = document.querySelectorAll("#textIgnoreRequest");
        for (let i = 0; i <  textareas.length; i++) {
            let text = textareas[i].value;
            ignoreRequest(buddy, text);
        }
  });
}

function ignoreRequest(buddy, text) {
    let formData = new FormData();

    formData.append('text', text);
    formData.append('sender', buddy);

    fetch('ajax/ignoreRequest.php', {
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