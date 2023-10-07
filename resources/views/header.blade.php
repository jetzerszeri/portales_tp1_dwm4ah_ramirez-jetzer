<header class="navegacion">
    <nav >
        <div class="navbar">
            <div>
                <a href="/" class="navbarlogo">GbyG PCS</a>

                <div class="toggle-button">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                
            </div>

            <div class="navbar-links">
                <ul>
                    <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a></li>
                    <li><a href="/services" class="{{ request()->is('services') ? 'active' : '' }}">Servicios</a></li>
                    @if(Auth::check())
                        <li><a href="/admin" class="{{ request()->is('admin*') ? 'active' : '' }}">Dashboard</a></li>
                    @endif
                </ul>
                <div>
                    <a href="{{ Auth::check() ? '/logout' : '/login' }}" class="btn">
                        {{ Auth::check() ? 'Cerrar sesión' : 'Iniciar sesión' }}
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>