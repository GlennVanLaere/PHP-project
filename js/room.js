let room = document.querySelectorAll("#room");

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
            console.log("complete!");
        }
    }
}

function goToEmpty(room, i) {
    if (room[i-1] !== undefined) {
        if (room[i-1].value === "") {
            room[i-1].focus();
        }
    }

    /*for (let i = 0; room[i].value === ""; i++) {
        room[i].focus();
        console.log(room[i]);
        return;
    }*/
}