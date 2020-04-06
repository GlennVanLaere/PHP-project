document.querySelector("#btnSendMessage").addEventListener("click", () => {
    sendMessage();
});

document.querySelector("#inputMessage").addEventListener("keypress", (e) => {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

function sendMessage() {
    let text = document.querySelector("#inputMessage").value;
}