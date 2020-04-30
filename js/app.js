document.querySelector("#btnSendMessage").addEventListener("click", () => {
    sendMessage();
});

document.querySelector("#inputMessage").addEventListener("keypress", (e) => {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    let message = document.querySelector("#inputMessage").value;
    let params = new URLSearchParams(location.search);
    let receiver = params.get('messageid');
    let formData = new FormData();

    formData.append('message', message);
    formData.append('receiver', receiver);

    fetch('ajax/saveMessage.php', {
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