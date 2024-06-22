<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homework Forum</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Homework Forum</h1>
    </header>
    <main>
        <div class="login-container">
            <h2>Login</h2>
            <form action="php/login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="register-container">
            <h2>Register</h2>
            <form action="php/register.php" method="POST">
                <label for="new-username">Username:</label>
                <input type="text" id="new-username" name="username" required>
                <label for="new-password">Password:</label>
                <input type="password" id="new-password" name="password" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>
