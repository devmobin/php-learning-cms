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

                <?php
                    if (isset($_GET['id'])) {
                        $category_id = $_GET['id'];

                        $query = "SELECT * FROM posts WHERE category = {$category_id} AND status = 'published' ";
                        $sql_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($sql_query)) {
                            $post_id = $row['id'];
                            $post_title = $row['title'];
                            $post_category = $row['category'];
                            $post_author = $row['author'];
                            $post_date = $row['date'];
                            $post_image = $row['image'];
                            $post_content = substr($row['content'], 0, 100);
                            $post_tags = $row['tags'];
                            $post_status = $row['status'];
                ?>
                    <!-- Blog Post -->
                    <h2>
                        <a href="post.php?id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="<?php echo $post_title ?>">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="post.php?id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php
                        }
                    }
                ?>

                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/layout/sidebar.php'; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include 'includes/layout/footer.php'; ?>
