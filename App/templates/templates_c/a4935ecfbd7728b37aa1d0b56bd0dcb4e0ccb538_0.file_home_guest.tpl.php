<?php
/* Smarty version 5.5.0, created on 2025-06-20 12:08:17
  from 'file:home_guest.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_68553311e92142_54733049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4935ecfbd7728b37aa1d0b56bd0dcb4e0ccb538' => 
    array (
      0 => 'home_guest.tpl',
      1 => 1750414009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68553311e92142_54733049 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
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
