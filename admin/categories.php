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
                            <?php // ADD NEW CATEGORY
                                if (isset($_POST['submit'])) {
                                    $title = $_POST['title'];

                                    if ($title == '' || empty($title)) {
                                        echo '<h5>Enter a title</h5>';
                                    } else {
                                        $query = "INSERT INTO categories(title) VALUE('{$title}')";
                                        $sql_query = mysqli_query($connection, $query);

                                        if (!$sql_query) {
                                            die('Failed' . mysqli_error($connection));
                                        }
                                        header('Location: categories.php');
                                    }
                                }
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input class="form-control" name="title" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success" name="submit" type="submit" value="Add">
                                </div>
                            </form>
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
                                            echo "<td><a class='btn btn-danger btn-sm' href='categories.php?delete={$id}'>Delete</a></td>";
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
