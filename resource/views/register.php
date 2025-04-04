<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="form-login" method="POST" action="/home">
        <h2>Sign up</h2>
        <input name="username" type="text" placeholder="Enter your name" required><br><br>
        <input name="password" type="text" placeholder="Create password" required><br><br>
        <input type="text" placeholder="Confirm password" required><br><br>
        <button type="submit">Sign up</button>
    </form>
</body>