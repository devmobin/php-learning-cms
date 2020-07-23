<?php include 'db.php';
    session_start();

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
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['user_role'] = $user['role'];

            header("Location: ../admin");
        } else {
            header("Location: ../index.php");
        }
    }
