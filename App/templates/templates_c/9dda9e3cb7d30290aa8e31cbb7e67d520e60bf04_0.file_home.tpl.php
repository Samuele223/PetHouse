<?php
/* Smarty version 5.5.0, created on 2025-06-19 21:10:06
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_6854608e38e6b5_47396170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9dda9e3cb7d30290aa8e31cbb7e67d520e60bf04' => 
    array (
      0 => 'home.tpl',
      1 => 1750360204,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6854608e38e6b5_47396170 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Benvenuto<?php if ($_smarty_tpl->getValue('is_logged_in')) {?>, <?php echo $_smarty_tpl->getValue('username');
}?>!</h1>

    <?php if ($_smarty_tpl->getValue('is_logged_in')) {?>
        <p>
            <a href="profile.php">
                <button>Profilo</button>
            </a>
        </p>
    <?php } else { ?>
        <p>
            <a href="user/login">
                <button>Login</button>
            </a>
        </p>

        <p>
            <a href="user/register">
                <button>Registrazione skibidi</button>
            </a>
        </p>
    <?php }?>
</body>
</html>
<?php }
}
