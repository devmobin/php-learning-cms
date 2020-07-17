<?php // HANDLE EDIT FORM SUBMIT
    if (isset($_POST['edit_user'])) {
        $query = "UPDATE users SET ";
        $query .="username = '{$_POST['username']}', ";
        $query .="firstname = '{$_POST['firstname']}', ";
        $query .="lastname = '{$_POST['lastname']}', ";
        $query .="email = '{$_POST['email']}', ";
        $query .="role = '{$_POST['role']}', ";
        $query .="password = '{$_POST['password']}' ";
        $query .= "WHERE id = {$_GET['edit']} ";

        $sql_query = mysqli_query($connection, $query);

        confirm_query($sql_query);
        header('Location: users.php');
    }
?>

<?php // GET EDITING USER FROM THE DATABASE
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $query = "SELECT * FROM users WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);

        $user = mysqli_fetch_assoc($sql_query);
        if (!$user) {
            echo "<h1>Not Found</h1>";
        } else {
?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username</label>
            <input value="<?php echo $user['username'] ?>" type="text" class="form-control" name="username">
        </div>

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input value="<?php echo $user['firstname'] ?>" type="text" class="form-control" name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input value="<?php echo $user['lastname'] ?>" type="text" class="form-control" name="lastname">
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
            <input value="<?php echo $user['email'] ?>" type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input value="<?php echo $user['password'] ?>" type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <input class="btn btn-warning" type="submit" name="edit_user" value="Save">
        </div>
    </form>
<?php } } ?>
