<h1>PHP Test Application</h1>

<div class="form-outline">
    <input class="form-control" type="search" placeholder="Search City" onkeyup="filterByCity(event)" aria-label="Search">
</div>
<div class="table-container">
    <table class="table table-striped" >
        <thead>
            <tr>
                <th class="col-md-3">Name</th>
                <th class="col-md-3">E-mail</th>
                <th class="col-md-3">City</th>
                <th class="col-md-3">Phone</th>
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
</div>
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
        <button class="btn btn-primary">Create new row</button>
    </div>
</form>
<link rel="stylesheet" type="text/css" href="css/user.css">
<script type="text/javascript" charset="utf-8" src="js/user_ajax.js"></script>