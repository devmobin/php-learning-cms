<?php // INSERT POST
    if (isset($_POST['create_post'])) {
//        $title = escape($_POST['title']);
//        $author = escape($_POST['author']);
//        $category = escape($_POST['category']);
//        $status = escape($_POST['status']);
//        $image = escape($_FILES['image']['name']);
//        $image_temp = escape($_FILES['image']['tmp_name']);
//        $tags = escape($_POST['tags']);
//        $content = escape($_POST['content']);
//        $date = escape(date('d-m-y'));

        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $status = $_POST['status'];
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $tags = $_POST['tags'];
        $content = $_POST['content'];
        $date = date('d-m-y');

        move_uploaded_file($image_temp, "../images/$image" );

        $query = "INSERT INTO posts(category, title, author, date, image, content, tags, status) ";

        $query .= "VALUES({$category}, '{$title}', '{$author}', now(), '{$image}', '{$content}', '{$tags}', '{$status}') ";

        $sql_query = mysqli_query($connection, $query);

        confirm_query($sql_query);

        $the_post_id = mysqli_insert_id($connection);

        echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
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
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <select class="form-control" name="status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control "name="content" id="body" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>
