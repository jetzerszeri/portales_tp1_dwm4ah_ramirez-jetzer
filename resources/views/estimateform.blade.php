<form action="" class="estimateform">
    <h2>Obtener estimado gratis!</h2>

    <div>
        <div>
            <label for="name">Nombre</label>
            <input type="text" placeholder="Ingresa el nombre" name="name">
        </div>
        <div>
            <label for="lastname">Apellido</label>
            <input type="text" placeholder="Ingresa el apellido" name="lastname">
        </div>
    </div>


    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" placeholder="Ingresa el correo electrónico" name="email">
    </div>

    <div>
        <label for="address">Dirección</label>
        <input type="text" placeholder="Ingresa la dirección" name="address">
    </div>

    <div>
        <div>
            <label for="city">Ciudad</label>
            <input type="text" placeholder="Ciudad" name="city">
        </div>
        <div>
            <label for="state">Estado</label>
            <select name="state">
                <option value="nc">NC</option>
                <option value="sc">SC</option>
            </select>
        </div>

        <div>
            <label for="zipcode">Código postal</label>
            <input type="number" placeholder="Zip code" name="zipcode">
        </div>
    </div>

    <div>
        <div>
            <label for="servicetype">Tipo de servicio</label>
            <select name="servicetype">
                <option value="1">Limpieza post remodelación</option>
                <option value="2">Limpieza mantenimiento</option>
                <option value="3">Limpieza final</option>
                <option value="4">Limpieza profunda</option>
            </select>
        </div>

        <div>
            <label for="servicedate">Fecha del servicio</label>
            <input type="date" name="servicedate">
        </div>
    </div>

    <div>
        <label for="note">Notas adicionales</label>
        <textarea name="note" placeholder="Ingresa las notas adicionales..."></textarea>
    </div>

    <div>
        <button type="submit" class="btn primary-yellow">Enviar</button>
    </div>
</form>