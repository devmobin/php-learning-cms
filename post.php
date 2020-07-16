<?php include 'includes/layout/header.php'; ?>

    <!-- Navigation -->
    <?php include 'includes/layout/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php // GET THE POST FOR THIS PAGE
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT * FROM posts WHERE id = {$id}";
                        $sql_query = mysqli_query($connection, $query);

                        $post = mysqli_fetch_assoc($sql_query);
                ?>
                    <!-- Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post['title'] ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post['author'] ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['date'] ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post['image'] ?>" alt="<?php echo $post['title'] ?>">
                    <hr>
                    <p><?php echo $post['content'] ?></p>
                <?php } ?>

                <hr>
                <?php include 'includes/post/comments.php'; ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/layout/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include 'includes/layout/footer.php'; ?>
