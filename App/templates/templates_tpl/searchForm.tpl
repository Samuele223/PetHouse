<form action="/PetHouse/findhostig/startresearch" method="post">
    <div>
        <label for="city">Città:</label>
        <input type="text" id="city" name="city" required>
    </div>

    <div>
        <label for="province">Provincia:</label>
        <input type="text" id="province" name="province" required>
    </div>

    <div>
        <label for="datain">Data inizio:</label>
        <input type="date" id="datain" name="datain" required>
    </div>

    <div>
        <label for="dataout">Data fine:</label>
        <input type="date" id="dataout" name="dataout" required>
    </div>

    <div>
        <label for="acceptedpet">Animali accettati:</label>
        <select id="acceptedpet" name="acceptedpet" required>
            <option value="">-- Seleziona --</option>
            <option value="cani">Cani</option>
            <option value="gatti">Gatti</option>
            <option value="entrambi">Entrambi</option>
        </select>
    </div>

    <div>
        <button type="submit">Cerca</button>
    </div>
</form>
