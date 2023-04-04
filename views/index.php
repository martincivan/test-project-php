<h1>PHP Test Application</h1>

<script>
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
</script>
<div class="form-outline">
    <input class="form-control" type="search" placeholder="Search City" onkeyup="filterByCity(event)" aria-label="Search">
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody id="users-table-body">
		<?php foreach($users as $user){?>
		<tr>
			<td class="name-value"><?=$user->getName()?></td>
			<td class="email-value"><?=$user->getEmail()?></td>
			<td class="city-value"><?=$user->getCity()?></td>
			<td class="phone-value"><?=$user->getPhone()?></td>
		</tr>
		<?php }?>
	</tbody>
</table>				

<form method="post" action="create.php" onsubmit="createUser(event)">
    <div class="form-group row">
        <label for="name">Name:</label>
        <input name="name" type="text" id="name" required class="form-control"/>
    </div>
    <div class="form-group row">
        <label for="email">E-mail:</label>
        <input name="email" type="email" id="email" required class="form-control"/>
    </div>
    <div class="form-group row">
        <label for="city">City:</label>
        <input name="city" type="text" id="city" required class="form-control"/>
    </div>
    <div class="form-group row">
        <label for="phone">Phone:</label>
        <input name="phone" type="tel" id="phone" required class="form-control"/>
    </div>
    <div class="form-group row">
        <button class="btn btn-default">Create new row</button>
    </div>
</form>