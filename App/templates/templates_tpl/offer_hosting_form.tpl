<!DOCTYPE html>
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
        {if $error}
            <div class="error">{$error}</div>
        {/if}
        <form method="post" action="/PetHouse/offerHosting/createOffer">
            <div>
                <label for="idPosition">Seleziona Casa:</label>
                <select name="idPosition" id="idPosition" required>
                    <option value="">-- Scegli una casa --</option>
                    {foreach from=$positions item=pos}
                        <option value="{$pos->getId()}">{$pos->getDescription()|escape}</option>
                    {/foreach}
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
    {assign var="allPets" value=["DOG","CAT","PARROT","FISH","HAMSTER","MOUSE","SNAKE","RABBIT","TURTLE"]}
    {foreach from=$allPets item=pet}
        {if $pet == 'DOG'}
            {assign var="label" value="Cani"}
        {elseif $pet == 'CAT'}
            {assign var="label" value="Gatti"}
        {elseif $pet == 'PARROT'}
            {assign var="label" value="Pappagalli"}
        {elseif $pet == 'FISH'}
            {assign var="label" value="Pesci"}
        {elseif $pet == 'HAMSTER'}
            {assign var="label" value="Criceti"}
        {elseif $pet == 'MOUSE'}
            {assign var="label" value="Topi"}
        {elseif $pet == 'SNAKE'}
            {assign var="label" value="Serpenti"}
        {elseif $pet == 'RABBIT'}
            {assign var="label" value="Conigli"}
        {else}
            {assign var="label" value="Tartarughe"}
        {/if}
        <div class="pet-item">
            <label for="pet-{$pet}">{$label}:</label>
            <button type="button" onclick="decrement('{$pet}')">–</button>
            <input  
              type="number"  
              id="pet-{$pet}"  
              name="acceptedPets[{$pet}]"  
              value="0"  
              min="0"
            />
            <button type="button" onclick="increment('{$pet}')">+</button>
        </div>
    {/foreach}
</div>

            </div>
            <button type="submit">Crea Offerta</button>
        </form>
    </div>
    {literal}
    <script>
      function increment(pet) {
        var input = document.getElementById('pet-' + pet);
        input.value = parseInt(input.value || 0) + 1;
      }
      function decrement(pet) {
        var input = document.getElementById('pet-' + pet);
        var v = parseInt(input.value || 0) - 1;
        input.value = v < 0 ? 0 : v;
      }
    </script>
    {/literal}
</body>
</html>
