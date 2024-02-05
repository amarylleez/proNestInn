document.addEventListener("DOMContentLoaded", function () {
    fetch('get_rooms.php')
        .then(response => response.json())
        .then(data => displayRooms(data));

    function displayRooms(rooms) {
        const roomList = document.getElementById('roomList');

        rooms.forEach(room => {
            const roomDiv = document.createElement('div');
            roomDiv.classList.add('room');

            roomDiv.innerHTML = `
                <p>Room Number: ${room.room_number}</p>
                <p>Room Type: ${room.room_type}</p>
                <p>Availability: ${room.availability ? 'Available' : 'Booked'}</p>
                <button onclick="bookRoom(${room.room_number})" ${room.availability ? '' : 'disabled'}>Book Room</button>
            `;

            roomList.appendChild(roomDiv);
        });
    }

    function bookRoom(roomNumber) {
        fetch('index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `room_number=${roomNumber}`,
        })
            .then(() => {
                alert(`Room ${roomNumber} booked successfully.`);
                location.reload();
            })
            .catch(error => console.error('Error:', error));
    }
});
