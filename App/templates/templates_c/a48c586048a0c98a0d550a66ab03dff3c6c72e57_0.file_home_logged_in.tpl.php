<?php
/* Smarty version 5.5.0, created on 2025-06-20 12:32:25
  from 'file:home_logged_in.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_685538b94b6949_70705314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a48c586048a0c98a0d550a66ab03dff3c6c72e57' => 
    array (
      0 => 'home_logged_in.tpl',
      1 => 1750415537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_685538b94b6949_70705314 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Home - Area Utente</title>
</head>
<body>
    <h1>Ciao <?php echo $_smarty_tpl->getValue('username');?>
, bentornato!</h1>

    <p>Benvenuto nella tua area personale. Da qui puoi accedere al tuo profilo o disconnetterti.</p>

    <p>
        <a href="user/profile">
            <button>Vai al tuo profilo</button>
        </a>
    </p>

    <p>
        <a href="user/logout">
            <button>Logout</button>
        </a>
    </p>

    <hr>
</body>
</html>
<?php }
}
