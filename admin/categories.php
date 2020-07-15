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
                            <form action="">
                                <div class="form-group">
                                    <label for="title">Category Title</label>
                                    <input class="form-control" name="title" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-success" name="submit" type="submit" value="Add">
                                </div>
                            </form>
                        </div>

                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include 'includes/layout/footer.php'; ?>
