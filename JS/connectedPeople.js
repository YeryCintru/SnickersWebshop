function fetchConnectedUsers() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/connected-users', true);
    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(this.responseText);
            document.getElementById('connected-count').textContent = response.count;
        }
    };
    xhr.send();
}

setInterval(fetchConnectedUsers, 5000);
fetchConnectedUsers(); 