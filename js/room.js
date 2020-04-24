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
            searchCampus();
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

function searchCampus() {
    let campus = document.querySelector("#campus").value;

    let formData = new FormData();

    formData.append('campus', campus);

    fetch('ajax/searchRoom.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        showResult(result);
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}

function showResult(result) {
    let floorNumber = document.querySelector("#floor").value;
    let room = document.querySelectorAll("#room");
    let floor;

    switch (floorNumber) {
        case "0":
            floor = "ground";
            break;

        case "1":
            floor = "1st";
            break;

        case "2":
            floor = "2nd";
            break;

        case "3":
            floor = "3rd";
            break;
    
        default:
            floor = floorNumber + "th"
            break;
    }
    if (result["campus"]) {
        document.querySelector("#result").innerHTML = `Room ${result["letter"]}${floorNumber}.${room[0].value}${room[1].value} is located on the ${floor} floor in ${result["campus"]}`;
        document.querySelector("#map").href = `https://maps.google.com/?q=Thomas More Mechelen - ${result["campus"]}`;
    } else {
        document.querySelector("#result").innerHTML = `We couldn't find this room`;
        document.querySelector("#map").href = `https://maps.google.com/?q=Thomas More Mechelen`;
    }
}