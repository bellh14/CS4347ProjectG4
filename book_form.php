<?php include ('db.php') ?>

<?php

if (isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];

    $query = "insert into `BOOK` (title, author, genre, description, quantity) values ('$title', '$author', '$genre', '$description', '$quantity')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:addBook.html?status=success');
    }
}


