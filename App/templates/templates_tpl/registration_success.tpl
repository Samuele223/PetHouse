<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/PetHouse/App/templates/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background: #fffbe6;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            padding: 3.5rem 3.5rem 2.7rem 3.5rem;
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(210,126,4,0.13);
            width: 540px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #d27e04;
            text-align: center;
            margin-bottom: 1.2rem;
            font-size: 2.7rem;
            font-weight: 800;
            letter-spacing: 0.7px;
        }
        p {
            text-align: center;
            margin-bottom: 2.1rem;
            color: #6d5c1e;
            font-size: 1.35rem;
        }
        .btn-login {
            display: block;
            width: 100%;
            padding: 0.6rem 0;
            background: #d4b200;
            color: #fff;
            border: none;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: 500;
            box-shadow: 0 1px 4px rgba(210,126,4,0.07);
            cursor: pointer;
            transition: background 0.18s, transform 0.13s;
            margin-bottom: 0.2rem;
        }
        .btn-login:hover {
            background: #d27e04;
            color: #fff;
            transform: translateY(-1px) scale(1.01);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Successful</h1>
        <p>Your account has been created.<br>
        You can now log in and start using PetHouse.</p>
        <a href="/PetHouse/User/login" class="btn btn-login">Go to Login</a>
    </div>
</body>
</html>
