<?php
/* Smarty version 5.5.1, created on 2025-06-19 16:45:33
  from 'file:offer_hosting_summary.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6854228d9a7b20_26713024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a78f90600d859882204fb66797094e1c61b3a696' => 
    array (
      0 => 'offer_hosting_summary.tpl',
      1 => 1750344294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6854228d9a7b20_26713024 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Riepilogo Offerta</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 2rem;
        }
        .container {
            background: #fff;
            max-width: 700px;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            margin-top: 0;
            font-size: 1.8rem;
            color: #2c3e50;
            text-align: center;
        }
        .summary {
            margin-top: 1rem;
            border: 1px solid #ddd;
            padding: 1.5rem;
            border-radius: 6px;
            background: #fafafa;
        }
        .summary p, .summary ul {
            margin: 0.8rem 0;
            line-height: 1.4;
        }
        .summary ul {
            list-style-type: none;
            padding-left: 0;
        }
        .summary li {
            margin-bottom: 0.5rem;
        }
        .btn {
            display: block;
            width: max-content;
            margin: 1.5rem auto 0;
            padding: 0.8rem 1.4rem;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Riepilogo Offerta di Alloggio</h2>
        <div class="summary">
            <p><strong>Casa:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getHouse()->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <p><strong>Titolo:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getTitle(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <p><strong>Descrizione:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getDesc(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php if ($_smarty_tpl->getValue('post')->getMoreInfo()) {?>
            <p><strong>Info aggiuntive:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')->getMoreInfo(), ENT_QUOTES, 'UTF-8', true);?>
</p>
            <?php }?>
            <p><strong>Prezzo a notte:</strong> <?php echo $_smarty_tpl->getValue('post')->getPrice();?>
 €</p>
            <p><strong>Check-in:</strong> <?php echo $_smarty_tpl->getValue('post')->getDateIn()->format('Y-m-d');?>
</p>
            <p><strong>Check-out:</strong> <?php echo $_smarty_tpl->getValue('post')->getDateOut()->format('Y-m-d');?>
</p>
            <p><strong>Animali ammessi:</strong></p>
            <ul>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('post')->getAcceptedPets(), 'qty', false, 'pet');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pet')->value => $_smarty_tpl->getVariable('qty')->value) {
$foreach0DoElse = false;
?>
                    <li>
                        <?php if ($_smarty_tpl->getValue('pet') == 'DOG') {?>Cani
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'CAT') {?>Gatti
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'PARROT') {?>Pappagalli
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'FISH') {?>Pesci
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'HAMSTER') {?>Criceti
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'MOUSE') {?>Topi
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'SNAKE') {?>Serpenti
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'RABBIT') {?>Conigli
                        <?php } elseif ($_smarty_tpl->getValue('pet') == 'TURTLE') {?>Tartarughe
                        <?php }?>: <?php echo $_smarty_tpl->getValue('qty');?>

                    </li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
        <a href="/PetHouse/User/personalProfile" class="btn">Torna al Profilo</a>
    </div>
</body>
</html>
<?php }
}
