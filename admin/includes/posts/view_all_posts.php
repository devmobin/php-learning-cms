<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php // GET ALL POSTS
            $query = "SELECT * FROM posts";
            $sql_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($sql_query)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$row['title']}</td>";

                $category_query = "SELECT * FROM categories WHERE id = {$row['category']}";
                $category_sql_query = mysqli_query($connection, $category_query);
                $category = mysqli_fetch_assoc($category_sql_query);
                echo "<td>{$category['title']}</td>";

                echo "<td>{$row['status']}</td>";
                echo "<td><img class='img-responsive' width='100' src='../images/{$row['image']}' alt='{$row['title']}'></td>";
                echo "<td>{$row['tags']}</td>";
                echo "<td>{$row['comments_count']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td><div class='btn-group-vertical'>";
                echo "<a class='btn btn-warning btn-sm' href='posts.php?source=edit_post&edit={$row['id']}'>Edit</a>";
                echo "<a class='btn btn-default btn-sm' href='../post.php?id={$row['id']}'>View</a>";
                echo "<a class='btn btn-danger btn-sm' href='posts.php?delete={$row['id']}'>Delete</a>";
                echo "</div></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php // DELETE POST
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);
        confirm_query($sql_query);
        header('Location: posts.php');
    }
?>
