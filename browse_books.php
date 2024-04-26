<?php include ('db.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="styles.css">
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
            max-width: 75%;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div id="header">
        <div>
            <span>Galaxy Team - CS 4347</span>
        </div>
        <div>
            <a href="index.php">Home</a>
            <a href="browse_books.php">Browse</a>
            <a href="addBook.html" target="_blank">Add New Book</a> <!-- Open link in new tab -->
            <a href="login.html">Login</a> <!-- Link to login page -->
        </div>
    </div>
    <div class="container">
        <h1>Browse Books</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $connection->prepare("SELECT * FROM `BOOK`");
                $stmt->execute();

                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['author'] . "</td>";
                        echo "<td>" . $row['genre'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td><a href='update_book.php?bookID=" . $row['bookID'] . "'>Update</a></td>";
                        echo "<td><a href='delete_book.php?bookID=" . $row['bookID'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                $stmt->close();

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>