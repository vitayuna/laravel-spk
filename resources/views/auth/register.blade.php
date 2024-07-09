<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .register-container h2 {
            color: #333333;
            margin-bottom: 20px;
        }
        .register-container form {
            display: flex;
            flex-direction: column;
            /* align-items: center; */
        }
        .register-container form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }
        .register-container form input[type="text"],
        .register-container form input[type="email"],
        .register-container form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #cccccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .register-container form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .register-container form button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .login-link {
            margin-top: 10px;
            text-align: center;
        }
        .login-link a {
            text-decoration: none;
            color: #007bff;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            <button type="submit">Register</button>
        </form>
        <div class="login-link">
            <p>Sudah punya akun?</p>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</body>
</html>
