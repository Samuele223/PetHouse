<?php
/* Smarty version 5.5.0, created on 2025-06-25 17:19:26
  from 'file:registration_success.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_685c137ed942c4_65447228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7e9ad253fc864675640baa290a836b7e8c73f4b' => 
    array (
      0 => 'registration_success.tpl',
      1 => 1750696848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685c137ed942c4_65447228 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
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
<?php }
}
