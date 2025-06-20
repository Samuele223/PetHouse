<?php
/* Smarty version 5.5.0, created on 2025-06-19 19:47:33
  from 'file:offer_hosting_form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.0',
  'unifunc' => 'content_68544d35a78618_20489893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90c014a68c87a7a2a9b803fc1821033558118487' => 
    array (
      0 => 'offer_hosting_form.tpl',
      1 => 1750354938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68544d35a78618_20489893 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\PetHouse\\App\\templates\\templates_tpl';
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Offri la tua Casa</title>
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
            max-width: 700px; /* leggermente più largo */
            margin: 0 auto; /* centrato orizzontalmente */
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
        .error {
            background: #ffe6e6;
            border: 1px solid #ff4d4d;
            padding: 0.8rem;
            border-radius: 4px;
            margin-bottom: 1.2rem;
        }
        form > div {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        input, select, textarea, button {
            font-family: inherit;
            font-size: 1rem;
        }
        input, select, textarea {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 0.8rem 1.4rem;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .pets {
            display: flex;
            flex-direction: column;
        }
        .pet-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .pet-item label {
            width: 100px; /* più spazio per label */
            margin: 0;
        }
        .pet-item input[type="number"] {
            width: 60px;
            margin: 0 0.5rem;
        }
        .pet-item button {
            padding: 0.4rem 0.8rem;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Offerta di Alloggio</h2>
        <?php if ($_smarty_tpl->getValue('error')) {?>
            <div class="error"><?php echo $_smarty_tpl->getValue('error');?>
</div>
        <?php }?>
        <form method="post" action="/PetHouse/offerHosting/createOffer">
            <div>
                <label for="idPosition">Seleziona Casa:</label>
                <select name="idPosition" id="idPosition" required>
                    <option value="">-- Scegli una casa --</option>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('positions'), 'pos');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pos')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('pos')->getId();?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('pos')->getDescription(), ENT_QUOTES, 'UTF-8', true);?>
</option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <div>
                <label for="title">Titolo:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="description">Descrizione:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div>
                <label for="moreInfo">Informazioni aggiuntive:</label>
                <textarea id="moreInfo" name="moreInfo" rows="3"></textarea>
            </div>
            <div>
                <label for="price">Prezzo a notte (€):</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <div>
                <label for="dateIn">Data Check-in:</label>
                <input type="date" id="dateIn" name="dateIn" required>
            </div>
            <div>
                <label for="dateOut">Data Check-out:</label>
                <input type="date" id="dateOut" name="dateOut" required>
            </div>
            <div>
                <label>Animali ammessi:</label>
                <div class="pets">
    <?php $_smarty_tpl->assign('allPets', array("DOG","CAT","PARROT","FISH","HAMSTER","MOUSE","SNAKE","RABBIT","TURTLE"), false, NULL);?>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('allPets'), 'pet');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('pet')->value) {
$foreach1DoElse = false;
?>
        <?php if ($_smarty_tpl->getValue('pet') == 'DOG') {?>
            <?php $_smarty_tpl->assign('label', "Cani", false, NULL);?>
        <?php } elseif ($_smarty_tpl->getValue('pet') == 'CAT') {?>
            <?php $_smarty_tpl->assign('label', "Gatti", false, NULL);?>
        <?php } elseif ($_smarty_tpl->getValue('pet') == 'PARROT') {?>
            <?php $_smarty_tpl->assign('label', "Pappagalli", false, NULL);?>
        <?php } elseif ($_smarty_tpl->getValue('pet') == 'FISH') {?>
            <?php $_smarty_tpl->assign('label', "Pesci", false, NULL);?>
        <?php } elseif ($_smarty_tpl->getValue('pet') == 'HAMSTER') {?>
            <?php $_smarty_tpl->assign('label', "Criceti", false, NULL);?>
        <?php } elseif ($_smarty_tpl->getValue('pet') == 'MOUSE') {?>
            <?php $_smarty_tpl->assign('label', "Topi", false, NULL);?>
        <?php } elseif ($_smarty_tpl->getValue('pet') == 'SNAKE') {?>
            <?php $_smarty_tpl->assign('label', "Serpenti", false, NULL);?>
        <?php } elseif ($_smarty_tpl->getValue('pet') == 'RABBIT') {?>
            <?php $_smarty_tpl->assign('label', "Conigli", false, NULL);?>
        <?php } else { ?>
            <?php $_smarty_tpl->assign('label', "Tartarughe", false, NULL);?>
        <?php }?>
        <div class="pet-item">
            <label for="pet-<?php echo $_smarty_tpl->getValue('pet');?>
"><?php echo $_smarty_tpl->getValue('label');?>
:</label>
            <button type="button" onclick="decrement('<?php echo $_smarty_tpl->getValue('pet');?>
')">–</button>
            <input  
              type="number"  
              id="pet-<?php echo $_smarty_tpl->getValue('pet');?>
"  
              name="acceptedPets[<?php echo $_smarty_tpl->getValue('pet');?>
]"  
              value="0"  
              min="0"
            />
            <button type="button" onclick="increment('<?php echo $_smarty_tpl->getValue('pet');?>
')">+</button>
        </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</div>

            </div>
            <button type="submit">Crea Offerta</button>
        </form>
    </div>
    
    <?php echo '<script'; ?>
>
      function increment(pet) {
        var input = document.getElementById('pet-' + pet);
        input.value = parseInt(input.value || 0) + 1;
      }
      function decrement(pet) {
        var input = document.getElementById('pet-' + pet);
        var v = parseInt(input.value || 0) - 1;
        input.value = v < 0 ? 0 : v;
      }
    <?php echo '</script'; ?>
>
    
</body>
</html>
<?php }
}
