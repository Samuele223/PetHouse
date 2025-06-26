<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Successful</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: linear-gradient(135deg, #fffbe6 0%, #ffe5b4 100%);
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            padding: 2.5rem 2.5rem 2rem 2.5rem;
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(174,156,39,0.13), 0 1.5px 8px rgba(210,126,4,0.07);
            width: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(40px);}
            to { opacity: 1; transform: translateY(0);}
        }
        .success-icon {
            font-size: 4rem;
            color: #d4b200;
            margin-bottom: 1.2rem;
            animation: pop 0.7s;
        }
        @keyframes pop {
            0% { transform: scale(0.5);}
            70% { transform: scale(1.2);}
            100% { transform: scale(1);}
        }
        h1 {
            color: #d27e04;
            text-align: center;
            margin-bottom: .7rem;
            font-size: 2rem;
            letter-spacing: 1px;
        }
        p {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #6d5c1e;
            font-size: 1.08rem;
        }
        .btn-login {
            display: block;
            width: 100%;
            padding: 0.7rem 0;
            background: linear-gradient(90deg, #d4b200 0%, #d27e04 100%);
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(210,126,4,0.08);
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            margin-bottom: 0.5rem;
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #d27e04 0%, #d4b200 100%);
            transform: translateY(-2px) scale(1.03);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">🎉</div>
        <h1>Registration Successful!</h1>
        <p>Your account has been created.<br>
        You can now log in and start using PetHouse.</p>
        <a href="/PetHouse/User/login" class="btn-login">Go to Login</a>
    </div>
</body>
</html>
