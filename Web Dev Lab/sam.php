<?php 
session_start(); // Start the session to use $_SESSION

// Handle logout
if (isset($_GET['logout'])) { 
    session_destroy(); // Destroy session data
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit(); // Stop further script execution
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 

    // Simple credential check (replace with real validation in production)
    if ($username === "admin" && $password === "1234") { 
        $_SESSION["user"] = $username; // Store username in session
    } else { 
        $error = "Invalid credentials."; // Set error message
    } 
} 
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>PHP Login with Session</title> 
</head> 
<body> 

<?php if (isset($_SESSION["user"])): ?> 
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["user"]); ?>!</h2> 
    <p><a href="?logout=true">Logout</a></p> 

<?php else: ?> 
    <h2>Login</h2> 
    <form method="post"> 
        Username: <input type="text" name="username" required><br><br> 
        Password: <input type="password" name="password" required><br><br> 
        <input type="submit" value="Login"> 
    </form> 
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?> 
    
<?php endif; ?>

</body> 
</html>