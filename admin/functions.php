<?php

function insert_category() {
    global $connection;
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
}
