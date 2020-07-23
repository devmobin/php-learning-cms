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

                    <?php // GET USER FROM THE DATABASE
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];

                        $query = "SELECT * FROM users WHERE username = '{$username}'";
                        $sql_query = mysqli_query($connection, $query);

                        $user = mysqli_fetch_assoc($sql_query);
                        if (!$user) {
                            echo "<h1>User Not Found</h1>";
                        } else {
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input value="<?php echo $user['username'] ?>" type="text" class="form-control"
                                           name="username">
                                </div>

                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input value="<?php echo $user['firstname'] ?>" type="text" class="form-control"
                                           name="firstname">
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input value="<?php echo $user['lastname'] ?>" type="text" class="form-control"
                                           name="lastname">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="<?php echo $user['role'] ?>"><?php echo $user['role'] ?></option>
                                        <?php
                                        if ($user['role'] == 'admin') {
                                            echo "<option value='subscriber'>Subscriber</option>";
                                        } else {
                                            echo "<option value='admin'>Admin</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="<?php echo $user['email'] ?>" type="email" class="form-control"
                                           name="email">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="<?php echo $user['password'] ?>" type="password" class="form-control"
                                           name="password">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-warning" type="submit" name="edit_profile" value="Save">
                                </div>
                            </form>
                        <?php }
                    } ?>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /#page-wrapper -->

    <?php // HANDLE EDIT FORM SUBMIT
    if (isset($_POST['edit_profile'])) {
        $query = "UPDATE users SET ";
        $query .="username = '{$_POST['username']}', ";
        $query .="firstname = '{$_POST['firstname']}', ";
        $query .="lastname = '{$_POST['lastname']}', ";
        $query .="email = '{$_POST['email']}', ";
        $query .="role = '{$_POST['role']}', ";
        $query .="password = '{$_POST['password']}' ";
        $query .= "WHERE username = '{$_SESSION['username']}' ";

        $sql_query = mysqli_query($connection, $query);

        confirm_query($sql_query);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['user_role'] = $_POST['role'];
        header('Location: profile.php');
    }
    ?>

</div><!-- /#wrapper -->

<?php include 'includes/layout/footer.php'; ?>
