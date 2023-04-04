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
</script>

<input type="search" placeholder="Search City" onkeyup="filterByCity(event)">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
		</tr>
	</thead>
	<tbody id="users-table-body">
		<?foreach($users as $user){?>
		<tr>
			<td class="name-value"><?=$user->getName()?></td>
			<td class="email-value"><?=$user->getEmail()?></td>
			<td class="city-value"><?=$user->getCity()?></td>
		</tr>
		<?}?>
	</tbody>
</table>				

<form method="post" action="create.php">
    <div class="form-group row">
        <label for="name">Name:</label>
        <input name="name" type="text" id="name" required class="form-control"/>
    </div>
    <div class="form-group row">
        <label for="email">E-mail:</label>
        <input name="email"type="email" id="email" required class="form-control"/>
    </div>
    <div class="form-group row">
        <label for="city">City:</label>
        <input name="city" type="text" id="city" required class="form-control"/>
    </div>
    <div class="form-group row">
        <button class="btn btn-default">Create new row</button>
    </div>
</form>