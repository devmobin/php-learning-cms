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

function find_all_categories() {
    global $connection;
    $query = "SELECT * FROM categories";
    $sql_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($sql_query)) {
        $id = $row['id'];
        $title = $row['title'];

        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$title}</td>";
        echo "<td><div class='btn-group'>";
        echo "<a class='btn btn-danger btn-sm' href='categories.php?delete={$id}'>Delete</a>";
        echo "<a class='btn btn-warning btn-sm' href='categories.php?edit={$id}'>Edit</a>";
        echo "</div></td>";
        echo "</tr>";
    }
}

function find_one_category() {
    global $connection;
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);

        return mysqli_fetch_assoc($sql_query);
    }
}

function edit_category() {
    global $connection;
    if (isset($_POST['update'])) {
        $id = $_GET['edit'];
        $title = $_POST['title'];

        if ($title == '' || empty($title)) {
            echo '<h5>Enter a title</h5>';
        } else {
            $query = "UPDATE categories SET title = '{$title}' WHERE id = '{$id}'";
            $sql_query = mysqli_query($connection, $query);

            if (!$sql_query) {
                die('Failed' . mysqli_error($connection));
            }
            header('Location: categories.php');
        }
    }
}

function delete_category() {
    global $connection;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE id = {$id}";
        $sql_query = mysqli_query($connection, $query);
        header('Location: categories.php');
    }
}
