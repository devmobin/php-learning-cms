<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>For</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php // GET ALL POSTS
            $query = "SELECT * FROM comments";
            $sql_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($sql_query)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$row['content']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['status']}</td>";

                $post_query = "SELECT * FROM posts WHERE id = {$row['post']}";
                $post_sql_query = mysqli_query($connection, $post_query);
                $post = mysqli_fetch_assoc($post_sql_query);
                echo "<td><a href='../post.php?id={$post['id']}'>{$post['title']}</a></td>";

                echo "<td>{$row['date']}</td>";
                echo "<td><div class='btn-group btn-group-vertical'>";
                echo "<a class='btn btn-primary btn-sm' href=''>Approve</a>";
                echo "<a class='btn btn-warning btn-sm' href=''>Deny</a>";
                echo "<a class='btn btn-danger btn-sm' href='comments.php?delete={$row['id']}'>Delete</a>";
                echo "</div></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php // DELETE COMMENT
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE id = {$id}";
    $sql_query = mysqli_query($connection, $query);
    if (!$sql_query) {
        die('Failed ' . mysqli_error($connection));
    }
    header('Location: comments.php');
}
?>
