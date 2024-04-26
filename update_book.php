<?php include ('db.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Book</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="styles.css" />
    <style>
        #header {
            background-color: #007bff;
            padding: 10px 0;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 20px;
            padding-right: 20px;
        }

        #header a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Add custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: black;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: calc(100% - 10px);
            padding: 10px;
            margin-bottom: 10px;
        }

        textarea {
            height: 100px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<?php
if (isset($_GET['bookID'])) {
    $bookID = $_GET['bookID'];
}
$query = "select * from `BOOK` where `bookID` = '$bookID'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Book not found");
} else {
    $book = mysqli_fetch_assoc($result);
}

?>

<?php

if (isset($_POST['update_book'])) {
    $bookID = $_GET['bookID_new'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];

    $query = "update `BOOK` set title = '$title', author = '$author', genre = '$genre', description = '$description', quantity = '$quantity' where bookID = '$bookID'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('location:browse_books.php?status=success');
    }
}


?>

<body>
    <!-- Header Section -->
    <div id="header">
        <div>
            <span>Galaxy Team - CS 4347</span>
        </div>
        <div>
            <a href="index.php">Home</a>
            <a href="browse_books.php">Browse</a>
            <a href="addBook.html" target="_blank">Add New Book</a>
            <!-- Open link in new tab -->
            <a href="login.html">Login</a>
            <!-- Link to login page -->
        </div>
    </div>
    <div class="container">
        <h1>Update Book</h1>
        <form action="update_book.php?bookID_new=<?php echo $bookID; ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $book['title'] ?>" required />

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $book['author'] ?>" required />

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" value="<?php echo $book['genre'] ?>" required />

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $book['description'] ?></textarea>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo $book['quantity'] ?>" required />

            <button type="submit" name="update_book">Update Book</button>
        </form>
    </div>
</body>

</html>