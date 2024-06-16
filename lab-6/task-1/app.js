document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    let formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('password', password);

    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('loginEmail').value;
    let password = document.getElementById('loginPassword').value;

    let formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
});

function deleteUser(id) {
    let formData = new FormData();
    formData.append('id', id);

    fetch('deleteUser.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        document.getElementById('getUsers').click();
    })
    .catch(error => console.error('Error:', error));
}

document.getElementById('getUsers').addEventListener('click', function() {
    fetch('getUsers.php')
    .then(response => response.json())
    .then(data => {
        let userList = document.getElementById('userList');
        userList.innerHTML = '';
        data.forEach(user => {
            let userItem = document.createElement('li');
            userItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            userItem.innerHTML = `${user.name} (${user.email}) <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Видалити</button> <button class="btn btn-primary btn-sm" onclick="editUser(${user.id}, '${user.name}', '${user.email}')">Редагувати</button>`;
            userList.appendChild(userItem);
        });
    })
    .catch(error => console.error('Error:', error));
});

function editUser(id, name, email) {
    document.getElementById('editUserId').value = id;
    document.getElementById('editUserName').value = name;
    document.getElementById('editUserEmail').value = email;
}

document.getElementById('editUserForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let id = document.getElementById('editUserId').value;
    let name = document.getElementById('editUserName').value;
    let email = document.getElementById('editUserEmail').value;

    let formData = new FormData();
    formData.append('id', id);
    formData.append('name', name);
    formData.append('email', email);

    fetch('editUser.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        document.getElementById('getUsers').click();
    })
    .catch(error => console.error('Error:', error));
});
