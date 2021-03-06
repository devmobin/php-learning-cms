<?php // INSERT USER
    if (isset($_POST['create_user'])) {
        $query = "INSERT INTO users (username, firstname, lastname, email, role, password, image) ";

        $query .= "VALUES('{$_POST['username']}', '{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}', '{$_POST['role']}', '{$_POST['password']}', 'none') ";

        $sql_query = mysqli_query($connection, $query);

        confirm_query($sql_query);
        echo "<p class='alert alert-success'>User Created: <a class='alert-link' href='users.php'>View Users</a></p>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname">
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname">
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="role">
            <option value="subscriber">Select Role</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>
</form>
