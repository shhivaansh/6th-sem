<?php
session_start();

if(isset($_GET["logout"])){
    session_destroy();
    header("Location: ".$_SERVER["PHP_SELF"]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "1234") {
        $_SESSION["user"]=$username;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Login with Session</title>
</head>
<body>

    <h2>Login</h2>

    <?php if (isset($_SESSION["user"])): ?>
        <h2>WELCOME</h2>
        <p><a href="?logout=true">Logout</a></p>

    <?php if(isset())

    <?php else: ?>
        <form method="post">
            <label>Username</label>
            <input type="text" name="username" required> <br><br>

            <label>Passwoord</label>
            <input type="password" name="password" required> <br><br>

            <button type="submit">Submit</button>
        </form>

        <?php
        if (isset($error)) {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
    <?php endif; ?>

</body>
</html>
