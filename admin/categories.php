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

                        <div class="col-xs-6">
                            <?php insert_category(); ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input class="form-control" name="title" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success" name="submit" type="submit" value="Add">
                                </div>
                            </form>

                            <?php edit_category(); ?>

                            <?php // DISPLAY EDIT CATEGORY FORM
                                if (isset($_GET['edit'])) {
                                    $row = find_one_category();
                                    $title = $row['title'];
                            ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="title">Category Title</label>
                                        <input class="form-control" name="title" type="text" value="<?php echo $title ?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-warning" name="update" type="submit" value="Edit">
                                    </div>
                                </form>
                            <?php } ?>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php find_all_categories(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->

        <?php delete_category(); ?>

    </div>
    <!-- /#wrapper -->

<?php include 'includes/layout/footer.php'; ?>
