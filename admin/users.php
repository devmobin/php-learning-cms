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

                        <?php // DISPLAY CORRECT PAGE
                            if (isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = '';
                            }
                            switch ($source) {
                                case 'add_user':
                                    include 'includes/users/add_users.php';
                                    break;

                                case 'edit_user':
                                    include 'includes/users/edit_users.php';
                                    break;

                                default:
                                    include 'includes/users/view_all_users.php';
                            }
                        ?>

                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<?php include 'includes/layout/footer.php'; ?>
