<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container h2 {
            color: #333333;
            margin-bottom: 20px;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
            /* align-items: center; */
        }
        .login-container form label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }
        .login-container form input[type="email"],
        .login-container form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #cccccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .login-container form button[type="submit"] {
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
        .login-container form button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .register-link {
            margin-top: 10px;
            text-align: center;
        }
        .register-link a {
            text-decoration: none;
            color: #007bff;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        @if($errors->any())
            <div class="error-message">{{$errors->first()}}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            <p>Belum punya akun?</p>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
