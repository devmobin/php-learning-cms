<?php include 'db.php';

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $sql_query = mysqli_query($connection, $query);

        if (!$sql_query) {
            die('Failed' . mysqli_error($connection));
        }

        $user = mysqli_fetch_assoc($sql_query);

        if (!$user) {
            die('User Not Found');
        }

        if ($username == $user['username'] && $password == $user['password']) {
            header("Location: ../admin");
        } else {
            header("Location: ../index.php");
        }
    }
