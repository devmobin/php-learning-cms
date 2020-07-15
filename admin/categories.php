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
                            <small>Author</small>
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
                                    $id = $_GET['edit'];
                                    $query = "SELECT * FROM categories WHERE id = {$id}";
                                    $sql_query = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($sql_query)) {
                                        $id = $row['id'];
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
                            <?php } } ?>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <?php // FIND ALL CATEGORIES
                                        $query = "SELECT * FROM categories";
                                        $sql_query = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($sql_query)) {
                                            $id = $row['id'];
                                            $title = $row['title'];

                                            echo "<tr>";
                                            echo "<td>{$id}</td>";
                                            echo "<td>{$title}</td>";
                                            echo "<td><div class='btn-group'><a class='btn btn-danger btn-sm' href='categories.php?delete={$id}'>Delete</a>";
                                            echo "<a class='btn btn-warning btn-sm' href='categories.php?edit={$id}'>Edit</a></div></td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->

        <?php // DELETE CATEGORY

            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $query = "DELETE FROM categories WHERE id = {$id}";
                $sql_query = mysqli_query($connection, $query);
                header('Location: categories.php');
            }

        ?>

    </div>
    <!-- /#wrapper -->

<?php include 'includes/layout/footer.php'; ?>
