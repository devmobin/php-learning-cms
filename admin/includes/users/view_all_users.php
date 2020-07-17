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
                echo "<a class='btn btn-primary btn-sm' href=''>Approve</a>";
                echo "<a class='btn btn-warning btn-sm' href=''>Deny</a>";
                echo "<a class='btn btn-danger btn-sm' href=''>Delete</a>";
                echo "</div></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
