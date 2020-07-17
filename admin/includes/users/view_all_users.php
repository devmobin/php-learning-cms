<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php // GET ALL USERS
            $query = "SELECT * FROM users ORDER BY id DESC";
            $sql_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($sql_query)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['username']}</td>";
                echo "<td>{$row['firstname']}</td>";
                echo "<td>{$row['lastname']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['role']}</td>";
                echo "<td><div class='btn-group btn-group-vertical'>";
                echo "<a class='btn btn-primary btn-sm' href='users.php?role_admin={$row['id']}'>Admin</a>";
                echo "<a class='btn btn-warning btn-sm' href='users.php?role_sub={$row['id']}'>Subscriber</a>";
                echo "<a class='btn btn-danger btn-sm' href='users.php?delete={$row['id']}'>Delete</a>";
                echo "</div></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php // CHANGE ROLE TO ADMIN
    if (isset($_GET['role_admin'])) {
        $id = $_GET['role_admin'];

        $query = "UPDATE users SET role = 'admin' WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);
        confirm_query($sql_query);
        header('Location: users.php');
    }
?>

<?php // CHANGE ROLE TO SUBSCRIBER
    if (isset($_GET['role_sub'])) {
        $id = $_GET['role_sub'];

        $query = "UPDATE users SET role = 'subscriber' WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);
        confirm_query($sql_query);
        header('Location: users.php');
    }
?>

<?php // DELETE USER
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = "DELETE FROM users WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);
        confirm_query($sql_query);
        header('Location: users.php');
    }
?>
