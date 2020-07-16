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
            echo "<td>{$row['category']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td><img class='img-responsive' width='100' src='../images/{$row['image']}' alt='{$row['title']}'></td>";
            echo "<td>{$row['tags']}</td>";
            echo "<td>{$row['comments_count']}</td>";
            echo "<td>{$row['date']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
