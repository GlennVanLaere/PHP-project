let room = document.querySelectorAll(".room");

for (let i = 0; i <  room.length; i++) {
    room[i].addEventListener("keyup", (e) => {
        let roominput =  room[i];
        goToNextInput(room, roominput, i, e);
  });
}

for (let i = 0; i <  room.length; i++) {
    room[i].addEventListener("focus", () => {
        goToEmpty(room, i);
  });
}

function goToNextInput(room, roominput, i, e) {

    if (e.key === "Backspace") {
        if (room[i-1] !== undefined) {
            room[i-1].focus();
            room[i-1].value= "";
        }
    }

    if (roominput.value.length >= 1) {
        if (room[i+1] !== undefined) {
            room[i+1].focus();
        } else {
            room[i].blur();
            searchRoom();
        }
    }
}

function goToEmpty(room, i) {
    if (room[i-1] !== undefined) {
        if (room[i-1].value === "") {
            room[i-1].focus();
        }
    }
}

function searchRoom() {
    let campus = document.querySelector("#campus").value;
    let floor = document.querySelector("#floor").value;

    let formData = new FormData();

    formData.append('campus', campus);
    formData.append('floor', floor);

    fetch('ajax/searchRoom.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        console.log('Success:', result);
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}