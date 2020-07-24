<?php // HANDLE EDIT FORM SUBMIT
    if (isset($_POST['edit_post'])) {
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/{$_FILES['image']['name']}" );

        $query = "UPDATE posts SET ";
        $query .="title = '{$_POST['title']}', ";
        $query .="category = '{$_POST['category']}', ";
        $query .="date = now(), ";
        $query .="author = '{$_POST['author']}', ";
        $query .="status = '{$_POST['status']}', ";
        $query .="tags = '{$_POST['tags']}', ";
        $query .="content = '{$_POST['content']}', ";

        if (empty($_FILES['image']['name'])) {
            $image_query = "SELECT image FROM posts WHERE id = {$_GET['edit']}";
            $image_sql_query = mysqli_query($connection, $image_query);
            $row = mysqli_fetch_assoc($image_sql_query);
            $query .="image = '{$row['image']}' ";
        } else {
            $query .="image = '{$_FILES['image']['name']}' ";
        }
        $query .= "WHERE id = {$_GET['edit']} ";

        $sql_query = mysqli_query($connection, $query);

        confirm_query($sql_query);

    }
?>

<?php // GET EDITING POST FROM THE DATABASE
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];

        $query = "SELECT * FROM posts WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);

        $post = mysqli_fetch_assoc($sql_query);
        if (!$post) {
            echo "<h1>Not Found</h1>";
        } else {
?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input value="<?php echo $post['title']; ?>" type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="">
                <?php // DISPLAY CATEGORIES
                    $query = "SELECT * FROM categories";
                    $sql_query = mysqli_query($connection,$query);

                    confirm_query($sql_query);

                    while($row = mysqli_fetch_assoc($sql_query)) {
                        $id = $row['id'];
                        $title = $row['title'];

                        echo "<option value='{$id}'>{$title}</option>";
                    }
                ?>
            </select>
        </div>

        <!--<div class="form-group">
            <label for="author">Users</label>
            <select name="author" id="">
                <?php // DISPLAY USERS
        /* $users_query = "SELECT * FROM users";
         $select_users = mysqli_query($connection,$users_query);

         confirmQuery($select_users);

         while($row = mysqli_fetch_assoc($select_users)) {
             $user_id = $row['user_id'];
             $username = $row['username'];

             echo "<option value='{$username}'>{$username}</option>";
         } */
        ?>
            </select>
        </div> -->

        <div class="form-group">
            <label for="author">Post Author</label>
            <input value="<?php echo $post['author']; ?>" type="text" class="form-control" name="author">
        </div>

        <div class="form-group">
            <label for="status">Post Status</label>
            <select class="form-control" name="status" id="">
                <?php
                    if ($post['status'] == 'draft') {
                        echo "<option value='draft'>Draft</option>";
                        echo "<option value='published'>Published</option>";
                    } else {
                        echo "<option value='published'>Published</option>";
                        echo "<option value='draft'>Draft</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Post Image</label>
            <input value="<?php echo $post['image']; ?>" type="file"  name="image">
            <img src="../images/<?php echo $post['image'] ?>" width="300" alt="post image">
        </div>

        <div class="form-group">
            <label for="tags">Post Tags</label>
            <input value="<?php echo $post['tags']; ?>" type="text" class="form-control" name="tags">
        </div>

        <div class="form-group">
            <label for="content">Post Content</label>
            <textarea class="form-control "name="content" id="body" cols="30" rows="10"><?php echo $post['content']; ?></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-warning" type="submit" name="edit_post" value="Edit Post">
        </div>
    </form>
<?php } } ?>
