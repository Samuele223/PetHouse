<style>
    .profile-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fdfdfd;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-family: sans-serif;
    }

    .profile-container img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 20px;
        border: 3px solid #ccc;
    }

    .profile-container h2 {
        margin-bottom: 10px;
        color: #333;
    }

    .profile-container p {
        margin: 5px 0;
        color: #555;
    }

    .profile-container .home-button {
        display: inline-block;
        margin-top: 25px;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .profile-container .home-button:hover {
        background-color: #0056b3;
    }
</style>

<div class="profile-container">
    <img src="/PetHouse/image/showImage/{$userId}" alt="Foto profilo di {$username}">
    <h2>Profilo di {$name} {$surname}</h2>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Username:</strong> {$username}</p>

    <a href="/PetHouse" class="home-button">Torna alla Home</a>
</div>

