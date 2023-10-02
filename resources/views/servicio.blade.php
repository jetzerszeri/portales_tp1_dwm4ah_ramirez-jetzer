@extends('layout')
@section('content')

<main class="mainofservice">

<nav class="breadcrumb">
    <ol>
        <li><a href="services.html">Servicios</a></li>
        <li aria-current="page">Limpieza post remodelación</li>
    </ol>
</nav>

<section class="servicesection">
    <div>
        <h1>Limpieza post remodelación /Construcción</h1>
        <img src="img/servicio1.webp" alt="escalera y herramientas de pintura en una habitación en construcción">
        <a href="services.html" class="btn primary-green"><</a>
    </div>

    <div>
        <div>

            <h2>Descripción</h2>
            <p>Nuestros servicios profesionales de limpieza posteriores a la renovación o construcción de una casa ofrecen una limpieza completa, detallada y meticulosa de su espacio nuevo o renovado. Este servicio incluye eliminar el polvo, la suciedad y los arañazos de todas las superficies, Aspirar y desempolvar madera, zócalos, puertas, accesorios y electrodomésticos y eliminación de pegatinas y etiquetas de cualquier instalación, entre otros.</p>

            <h2>Precios</h2>
            <p>Cada limpieza es única y tiene un precio basado en los pies cuadrados de la propiedad y el tipo de limpieza que se necesite. Ofrecemos presupuestos/estimados personalizados gratuitos para cada proyecto antes de empezar. Esto garantiza que nuestros clientes nunca se sorprendan por los costos y que todas sus necesidades sean abordadas. Solicita tu estimado gratis!</p>
        </div>

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

    </div>
</section>
</main>


@endsection