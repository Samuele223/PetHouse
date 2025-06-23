<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
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
            align-items: center;
        }
        .success-icon {
            font-size: 3rem;
            color:rgb(174, 156, 39);
            margin-bottom: 1rem;
        }
        h1 {
            color: #d27e04;
            text-align: center;
            margin-bottom: .5rem;
        }
        p {
            text-align: center;
            margin-bottom: 1.2rem;
            color: #d27e04;
        }
        a {
            color: #d27e04;
            text-decoration: none;
            font-weight: 500;
            margin-top: .5rem;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✔️</div>
        <h1>Registration Successful!</h1>
        <p>Your account has been created.<br>
        You can now <a href="/PetHouse/User/login">login here</a>.</p>
    </div>
</body>
</html>
