<h1>PHP Test Application</h1>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>E-mail</th>
			<th>City</th>
		</tr>
	</thead>
	<tbody>
		<?foreach($users as $user){?>
		<tr>
			<td><?=$user->getName()?></td>
			<td><?=$user->getEmail()?></td>
			<td><?=$user->getCity()?></td>
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