<div>
        <div>
            <label for="name">Nombre</label>
            <input type="text" placeholder="Ingresa el nombre" name="name"  value="{{ old('name', optional($solicitud)->name) }}">
            <p>{{ $errors->first('name') }}</p>
        </div>
        <div>
            <label for="lastname">Apellido</label>
            <input type="text" placeholder="Ingresa el apellido" name="lastname" value="{{ old('lastname', optional($solicitud)->lastname) }}">
            <p>{{ $errors->first('lastname') }}</p>
        </div>
    </div>


    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" placeholder="Ingresa el correo electrónico" name="email" value="{{ old('email', optional($solicitud)->email) }}">
        <p>{{ $errors->first('email') }}</p>
    </div>

    <div>
        <label for="address">Dirección</label>
        <input type="text" placeholder="Ingresa la dirección" name="address" value="{{ old('address', optional($solicitud)->address) }}">
        <p>{{ $errors->first('address') }}</p>
    </div>

    <div>
        <div>
            <label for="city">Ciudad</label>
            <input type="text" placeholder="Ciudad" name="city" value="{{ old('city', optional($solicitud)->city) }}">
            <p>{{ $errors->first('city') }}</p>
        </div>
        <div>
            <label for="state_id">Estado</label>
            <select name="state_id">
                @foreach($statesList as $state)
                    <option value="{{ $state->id }}" {{ old('state_id', optional($solicitud)->state_id) == $state->id ? 'selected' : '' }}>{{ $state->abbreviation }}</option>
                @endforeach
            </select>
            <p>{{ $errors->first('state_id') }}</p>
        </div>

        <div>
            <label for="zip_code">Código postal</label>
            <input type="number" placeholder="Zip code" name="zip_code" value="{{ old('zip_code', optional($solicitud)->zip_code) }}">
            <p>{{ $errors->first('zip_code') }}</p>
        </div>
    </div>

    <div>
        <div>
            <label for="service_id">Tipo de servicio</label>
            <select name="service_id">
                @foreach($servicesList as $servicio)
                    <option value="{{ $servicio->id }}" {{ old('service_id', optional($solicitud)->service_id) == $servicio->id ? 'selected' : '' }}>{{ $servicio->name }}</option>
                @endforeach
            </select>
            <p>{{ $errors->first('service_id') }}</p>
        </div>

        <div>
            <label for="service_date">Fecha del servicio</label>
            <input type="date" name="service_date" value="{{ old('service_date', optional($solicitud)->service_date) }}">
            <p>{{ $errors->first('service_date') }}</p>
        </div>
    </div>

    <div>
        <label for="notes">{{$label_nota}}</label>
        <textarea name="notes" placeholder="Ingresa las notas adicionales...">{{ old('notes', optional($solicitud)->notes) }}</textarea>
        <p>{{ $errors->first('notes') }}</p>
    </div>

    <div>
        <button type="submit" class="btn primary-yellow">Enviar</button>
    </div>