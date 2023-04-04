function filterByCity(event) {
    let table = document.getElementById('users-table-body');
    let tr = table.getElementsByTagName('tr');
    for(let row of tr) {
        let tds = [...row.getElementsByTagName('td')];
        let values = tds.filter(td => td.classList.contains('city-value'))
        let city = values[0].innerText;
        if(city.toLowerCase().indexOf(event.target.value.toLowerCase()) > -1) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}

function createUser(event) {
    event.preventDefault();
    let form = event.target;
    let data = new FormData(form);
    fetch(form.action, {
        method: 'POST',
        body: data
    }).then(response => {
        if(response.status === 200) {
            let table = document.getElementById('users-table-body');
            let row = document.createElement('tr');
            let name = document.createElement('td');
            name.className = "name-value"
            name.innerText = data.get("name");
            let email = document.createElement('td');
            email.innerText = data.get("email");
            email.className = "email-value"
            let city = document.createElement('td');
            city.innerText = data.get("city");
            city.className = "city-value"
            let phone = document.createElement('td');
            phone.innerText = data.get("phone");
            phone.className = "phone-value"
            row.appendChild(name);
            row.appendChild(email);
            row.appendChild(city);
            row.appendChild(phone);
            table.appendChild(row);
            form.reset();
        } else if (response.status === 400) {
            response.text().then(text => {
                alert(text);
            });
        }
    });

}