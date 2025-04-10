<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="form-login" method="POST" action="/login">
        <h2>Login</h2>
        <input type="text" name= "username" placeholder="Enter your name" required><br><br>
        <input type="password" name="password" placeholder="Enter your password" required><br><br>
        <button type="submit">Login</button><br><br>
        
    </form>
</body>
</html> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for background and form -->
    <style>
        body {
            background-color: #343a40; /* Dark background */
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-login {
            background-color: #495057;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .form-login h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-login .form-group {
            margin-bottom: 15px;
        }

        .form-login button {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form class="form-login" method="POST" action="/check">
        <h2>Login</h2>

        <!-- Username Field -->
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required>
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Login</button><br><br>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>