<?php include ('db.php') ?>


<?php

if (isset($_GET['bookID'])) {
    $bookID = $_GET['bookID'];

    $query = "delete from `BOOK` where bookID = '$bookID'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:browse_books.php?status=success');
    }
}