<?php
/* Smarty version 5.5.0, created on 2025-06-20 12:55:35
  from 'file:profile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_68553e27e90ef5_77475391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd283ecfebb4c072554f9f75a38de8e16128265d8' => 
    array (
      0 => 'profile.tpl',
      1 => 1750416933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68553e27e90ef5_77475391 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Profilo Utente</title>
    <link rel="stylesheet" href="/PetHouse/App/templates/css/style.css">
</head>
<body>

<div class="profile-card">
    <img src="img/avatar.png" alt="Foto Profilo">
    <h2><?php echo $_smarty_tpl->getValue('name');?>
 <?php echo $_smarty_tpl->getValue('surname');?>
</h2>
    <p><strong>Email:</strong><br><?php echo $_smarty_tpl->getValue('email');?>
</p>

    <a href="index.php" class="back-button">🏠 Torna alla Home</a>
</div>

</body>
</html>
<?php }
}
