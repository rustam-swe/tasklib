<!-- <!DOCTYPE html>
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
</body> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #343a40;
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
    <form class="form-login" method="POST" action="/create">
        <h2>Sign up</h2>

        <!-- Username Field -->
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="username" placeholder="Enter your name" required  minlength="3">
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Create password" required>
        </div>

        

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>