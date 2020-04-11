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

let removeButton = document.querySelector("#btnRemoveBuddy");

if(removeButton){
    removeButton.addEventListener("click", () => {
        removeBuddy();
    });
}

function removeBuddy() {
    let formData = new FormData();

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

let acceptButton = document.querySelector("#btnAcceptRequest");

if(acceptButton){
    acceptButton.addEventListener("click", () => {
        let buddy =   acceptButton.dataset.buddy;
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
        location.reload();
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}