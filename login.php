<?php include ('db.php') ?>

<?php


// sql injection select example
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = mysqli_query($connection, $query);



    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $user = mysqli_fetch_assoc($result);
        header('location:index.php?user=' . $user['username'] . '&password=' . $user['password']);
    }
}


// sql injection update example
if (isset($_POST['update_login'])) {
    $username = $_POST['username']; // user' #
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $query = "UPDATE users SET password='$new_password' WHERE username='$username' AND password='$old_password'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        // $user = mysqli_fetch_assoc($result);
        header('location:index.php?user=' . $username . '&password=' . $user['password']);
    }
}

// prevent sql injection with prepared statement
// if (isset($_POST['login'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $stmt = $connection->prepare("SELECT * FROM users WHERE username=? AND password=?");
//     $stmt->bind_param("ss", $username, $password);
//     $stmt->execute();

//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();
//         header('location:index.php?user=' . $user['username'] . '&password=' . $user['password']);
//     } else {
//         echo "Failed to login";
//     }
//     $stmt->close();
// }