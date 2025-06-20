<?php
/* Smarty version 5.5.0, created on 2025-06-20 16:28:10
  from 'file:home_guest.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_68556ffacb9011_38512192',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e17017c657ff329650585c60c207b0081b484d5' => 
    array (
      0 => 'home_guest.tpl',
      1 => 1750429443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68556ffacb9011_38512192 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/PetHouse/App/templates/templates_tpl';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Home - Benvenuto Ospite</title>
</head>
<body>
    <h1>Benvenuto Nella Home del nostro sito</h1>

    <p>Per continuare, accedi o registrati se non hai ancora un account.</p>

    <p>
        <a href="user/login">
            <button>Login</button>
        </a>
    </p>

    <p>
        <a href="user/registration">
            <button>Registrazione</button>
        </a>
    </p>

    <hr>
</body>
</html>


<?php }
}
