<?php include ('db.php') ?>

<!DOCTYPE html>
<html lang="en">

head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Library Management System</title>
<!-- Add your CSS links here -->
<link rel="stylesheet" href="styles.css">
<style>
    /* Add custom CSS styles here */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    #home {
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    #search,
    #login {
        width: 50%;
        float: left;
        margin-right: 10px;
        /* Add margin between search and login */
    }

    #user-account,
    #contact {
        width: 50%;
        float: right;
        margin-left: 10px;
        /* Add margin between user account and contact */
        text-align: right;
        /* Align text to the right */
    }

    form {
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"],
    button {
        width: calc(100% - 10px);
        padding: 10px;
        margin-bottom: 10px;
        display: block;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    footer {
        clear: both;
        margin-top: 20px;
        padding: 10px;
        background-color: #f4f4f4;
        text-align: center;
    }
</style>
</head>

<body>
    <!-- Home Page -->
    <div id="home">
        <h1>Welcome to the Library Management System</h1>
        <div id="search">
            <h2>Search for Books</h2>
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Enter book title or author">
                <button type="submit">Search</button>
            </form>
            <?php
            $query = "select * from `BOOK`";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($connection));
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<strong>bookID:</strong> " . $row['bookID'] . "<br>";
                    echo "<p><strong>Title:</strong> " . $row['title'] . "<br>";
                    echo "<strong>Author:</strong> " . $row['author'] . "<br>";
                    echo "<strong>Genre:</strong> " . $row['genre'] . "<br>";
                    echo "<strong>Avaliability:</strong>" . $row['availability'] . "</p>";
                }
            }

            ?>
        </div>
        <div id="login">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
        <div id="user-account">
            <h2>User Account</h2>
            <a href="user-account.php">View Account</a>
        </div>
        <div id="contact">
            <h2>Contact Information</h2>
            <!-- Add contact information here -->
            <h3>Galaxy Team - CS 4347</h3>
        </div>
    </div>

    <!-- Add your JavaScript links here -->
    <script src="script.js"></script>
</body>

</html>