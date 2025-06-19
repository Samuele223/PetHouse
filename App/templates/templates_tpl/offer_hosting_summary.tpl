<!DOCTYPE html>
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
            <p><strong>Casa:</strong> {$post->getHouse()->getDescription()|escape}</p>
            <p><strong>Titolo:</strong> {$post->getTitle()|escape}</p>
            <p><strong>Descrizione:</strong> {$post->getDesc()|escape}</p>
            {if $post->getMoreInfo()}
            <p><strong>Info aggiuntive:</strong> {$post->getMoreInfo()|escape}</p>
            {/if}
            <p><strong>Prezzo a notte:</strong> {$post->getPrice()} €</p>
            <p><strong>Check-in:</strong> {$post->getDateIn()->format('Y-m-d')}</p>
            <p><strong>Check-out:</strong> {$post->getDateOut()->format('Y-m-d')}</p>
            <p><strong>Animali ammessi:</strong></p>
            <ul>
                {foreach from=$post->getAcceptedPets() key=pet item=qty}
                    <li>
                        {if $pet=='DOG'}Cani
                        {elseif $pet=='CAT'}Gatti
                        {elseif $pet=='PARROT'}Pappagalli
                        {elseif $pet=='FISH'}Pesci
                        {elseif $pet=='HAMSTER'}Criceti
                        {elseif $pet=='MOUSE'}Topi
                        {elseif $pet=='SNAKE'}Serpenti
                        {elseif $pet=='RABBIT'}Conigli
                        {elseif $pet=='TURTLE'}Tartarughe
                        {/if}: {$qty}
                    </li>
                {/foreach}
            </ul>
        </div>
        <a href="/PetHouse/User/personalProfile" class="btn">Torna al Profilo</a>
    </div>
</body>
</html>
