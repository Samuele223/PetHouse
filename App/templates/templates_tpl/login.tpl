<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <style>
        body {
            background: #f5f6fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            background: #fff;
            padding: 2rem 2.5rem;
            border-radius: 16px;
            box-shadow: 0 2px 24px rgba(34,34,34,0.10);
            width: 340px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        h1 {
            text-align: center;
            color: #303952;
        }
        label {
            display: flex;
            flex-direction: column;
            font-weight: 500;
            margin-bottom: .5rem;
        }
        input[type="text"], input[type="password"] {
            padding: .7rem;
            border-radius: 8px;
            border: 1px solid #d1d8e0;
            margin-top: .3rem;
        }
        button {
            padding: .8rem;
            background: #218c5b;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            margin-top: .5rem;
            transition: background .2s;
        }
        button:hover {
            background: #186145;
        }
        .error {
            color: #e84118;
            background: #fdecea;
            border-radius: 6px;
            padding: .5rem;
            text-align: center;
        }
        .link {
            text-align: center;
            margin-top: 1rem;
        }
        .link a {
            color: #218c5b;
            text-decoration: none;
            font-weight: 500;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        {if $error}
            <div class="error">{$error}</div>
        {/if}
        <form action="/PetHouse/User/login" method="post">
            <label>
                Username:
                <input type="text" name="username" required>
            </label>
            <label>
                Password:
                <input type="password" name="password" required>
            </label>
            <button type="submit">Login</button>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="/PetHouse/User/register">Register here</a></p>
        </div>
    </div>
</body>
</html>
