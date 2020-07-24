<?php include 'includes/layout/header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/layout/navigation.php'; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-file-text fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'>
                                                    <?php
                                                        $query = "SELECT * FROM posts";
                                                        $sql_query = mysqli_query($connection, $query);

                                                        $posts_count = mysqli_num_rows($sql_query);
                                                        echo $posts_count;
                                                    ?>
                                                </div>
                                                <div>Posts</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="posts.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-comments fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'>
                                                    <?php
                                                        $query = "SELECT * FROM comments";
                                                        $sql_query = mysqli_query($connection, $query);

                                                        $comments_count = mysqli_num_rows($sql_query);
                                                        echo $comments_count;
                                                    ?>
                                                </div>
                                                <div>Comments</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="comments.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'>
                                                    <?php
                                                        $query = "SELECT * FROM users";
                                                        $sql_query = mysqli_query($connection, $query);

                                                        $users_count = mysqli_num_rows($sql_query);
                                                        echo $users_count;
                                                    ?>
                                                </div>
                                                <div> Users</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="users.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class='huge'>
                                                    <?php
                                                        $query = "SELECT * FROM posts";
                                                        $sql_query = mysqli_query($connection, $query);

                                                        $categories_count = mysqli_num_rows($sql_query);
                                                        echo $categories_count;
                                                    ?>
                                                </div>
                                                <div>Categories</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="categories.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
                        </div>

                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php
        $query = "SELECT * FROM posts WHERE status = 'draft'";
        $sql_query = mysqli_query($connection, $query);
        $draft_posts_count = mysqli_num_rows($sql_query);

        $query = "SELECT * FROM comments WHERE status = 'unapproved'";
        $sql_query = mysqli_query($connection, $query);
        $unapproved_comments_count = mysqli_num_rows($sql_query);

        $query = "SELECT * FROM users WHERE role = 'subscriber'";
        $sql_query = mysqli_query($connection, $query);
        $subscriber_users_count = mysqli_num_rows($sql_query);
    ?>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Count'],
                <?php
                    $element_text = ['Active Posts', 'Draft Posts', 'Categories', 'Users', 'Subscribers', 'Comments', 'Unapproved Comments'];
                    $element_count = [$posts_count, $draft_posts_count, $categories_count, $users_count, $subscriber_users_count, $comments_count, $unapproved_comments_count];

                    for ($i = 0; $i < sizeof($element_count); $i++) {
                        echo "['{$element_text[$i]}', {$element_count[$i]}],";
                    }
                ?>
            ]);

            var options = {
                chart: {
                    title: 'Website reports',
                    subtitle: 'Posts, Comments, and Users: This Year',
                },
                backgroundColor: '#333',
                textStyle: {
                    color: '#fff'
                },
                chartArea: {
                    backgroundColor: '#555'
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

<?php include 'includes/layout/footer.php'; ?>

