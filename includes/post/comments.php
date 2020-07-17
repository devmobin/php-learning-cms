<?php // CREATE COMMENT
    if (isset($_POST['create_comment'])) {
        $post_id = $_GET['id'];

        $query = "INSERT INTO comments (post, author, email, content, status, date) ";
        $query .= "VALUES ('{$post_id}', '{$_POST['author']}', '{$_POST['email']}', '{$_POST['content']}', 'unapproved', now())";
        $sql_query = mysqli_query($connection, $query);

        if (!$sql_query) {
            die('Failed ' . mysqli_error($connection));
        }

        // increase the comments count
        $comments_count_query = "UPDATE posts SET comments_count = comments_count + 1 ";
        $comments_count_query .= "WHERE id = {$post_id}";
        $comments_count_sql_query = mysqli_query($connection, $comments_count_query);
    }
?>
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form action="" method="post" role="form">
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" name="comment_author">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" name="comment_email">
        </div>

        <div class="form-group">
            <label for="content">Your Comment</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->

<?php // GET COMMENTS
    $post_id = $_GET['id'];
    $query = "SELECT * FROM comments WHERE post = {$post_id} ";
    $query .= "AND status = 'approved' ";
    $query .= "ORDER BY date DESC ";

    $sql_query = mysqli_query($connection, $query);

    if (!$sql_query) {
        die('Failed ' . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($sql_query)) {
?>
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="comment">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $row['author'] ?>
                <small><?php echo $row['date'] ?></small>
            </h4>
            <?php echo $row['content'] ?>
        </div>
    </div>
<?php } ?>

<!-- Comment -->
<!--
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        <!- Nested Comment --
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!- End Nested Comment --
    </div>
</div>
-->
