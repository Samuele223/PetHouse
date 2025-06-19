<?php
/* Smarty version 5.5.1, created on 2025-06-19 16:45:01
  from 'file:registration.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6854226dcad7c4_97008743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '313ef9a26d7437a6d8c439d169ef8e423ff44105' => 
    array (
      0 => 'registration.tpl',
      1 => 1749424585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6854226dcad7c4_97008743 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
            width: 360px;
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
        input[type="text"], input[type="email"], input[type="password"] {
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
        <h1>Register</h1>
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="error"><?php echo $_smarty_tpl->getValue('error');?>
</div>
        <?php }?>
        <form action="/PetHouse/User/registration" method="post">
            <label>
                Username:
                <input type="text" name="username" required>
            </label>
            <label>
                Name:
                <input type="text" name="name" required>
            </label>
            <label>
                Surname:
                <input type="text" name="surname" required>
            </label>
            <label>
                Email:
                <input type="email" name="email" required>
            </label>
            <label>
                Password:
                <input type="password" name="password" required>
            </label>
            <button type="submit">Register</button>
        </form>
        <div class="link">
            <p>Already registered? <a href="/PetHouse/User/login">Login here</a></p>
        </div>
    </div>
</body>
</html>
<?php }
}
