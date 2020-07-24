<?php include 'includes/layout/header.php'; ?>
<script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>

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

                        <?php // DISPLAY CORRECT PAGE
                            if (isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = '';
                            }
                            switch ($source) {
                                case 'add_post':
                                    include 'includes/posts/add_posts.php';
                                    break;

                                case 'edit_post':
                                    include 'includes/posts/edit_posts.php';
                                    break;

                                default:
                                    include 'includes/posts/view_all_posts.php';
                            }
                        ?>

                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<?php include 'includes/layout/footer.php'; ?>
