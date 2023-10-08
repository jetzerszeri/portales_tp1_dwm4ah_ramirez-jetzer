<form action="" class="estimateform" method="post">
@csrf
    <h2>Obtener estimado gratis!</h2>

    <div>
        <div>
            <label for="name">Nombre</label>
            <input type="text" placeholder="Ingresa el nombre" name="name"  value="{{ old('name') }}">
            <p>{{ $errors->first('name') }}</p>
        </div>
        <div>
            <label for="lastname">Apellido</label>
            <input type="text" placeholder="Ingresa el apellido" name="lastname" value="{{ old('lastname') }}">
            <p>{{ $errors->first('lastname') }}</p>
        </div>
    </div>


    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" placeholder="Ingresa el correo electrónico" name="email" value="{{ old('email') }}">
        <p>{{ $errors->first('email') }}</p>
    </div>

    <div>
        <label for="address">Dirección</label>
        <input type="text" placeholder="Ingresa la dirección" name="address" value="{{ old('address') }}">
        <p>{{ $errors->first('address') }}</p>
    </div>

    <div>
        <div>
            <label for="city">Ciudad</label>
            <input type="text" placeholder="Ciudad" name="city" value="{{ old('city') }}">
            <p>{{ $errors->first('city') }}</p>
        </div>
        <div>
            <label for="state_id">Estado</label>
            <select name="state_id">
                <option value="1" @selected(old("state_id") == 1)>NC</option>
                <option value="2" @selected(old("state_id") == 2)>SC</option>
            </select>
            <p>{{ $errors->first('state_id') }}</p>
        </div>

        <div>
            <label for="zip_code">Código postal</label>
            <input type="number" placeholder="Zip code" name="zip_code" value="{{ old('zip_code') }}">
            <p>{{ $errors->first('zip_code') }}</p>
        </div>
    </div>

    <div>
        <div>
            <label for="service_id">Tipo de servicio</label>
            <select name="service_id">
                <option value="1" @selected(old("service_id") == 1)>Limpieza post remodelación</option>
                <option value="2" @selected(old("service_id") == 2)>Limpieza mantenimiento</option>
                <option value="3" @selected(old("service_id") == 3)>Limpieza final</option>
                <option value="4" @selected(old("service_id") == 4)>Limpieza profunda</option>
            </select>
            <p>{{ $errors->first('service_id') }}</p>
        </div>

        <div>
            <label for="service_date">Fecha del servicio</label>
            <input type="date" name="service_date" value="{{ old('service_date') }}">
            <p>{{ $errors->first('service_date') }}</p>
        </div>
    </div>

    <div>
        <label for="notes">Notas adicionales</label>
        <textarea name="notes" placeholder="Ingresa las notas adicionales...">{{ old('notes') }}</textarea>
        <p>{{ $errors->first('notes') }}</p>
    </div>

    <div>
        <button type="submit" class="btn primary-yellow">Enviar</button>
    </div>
</form>