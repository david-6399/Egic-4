    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a href="/ " class="{{ request()->is('home') ? 'active' : '' }} ">Accueil</a></li>
            <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">A propos de ATA</a></li>
            <li><a href="/formation" class="{{ request()->is('formation') ? 'active' : '' }}">Nos Formation</a></li>
            <li><a href="/evenement" class="{{ request()->is('evenement') ? 'active' : '' }}">Evenement</a></li>
            <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>

            <div class="border-left"></div>
            @guest

                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="">{{ __('Login') }}</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="get-started-btn">{{ __('Register') }}</a>
                @endif
            @else
                <a href="/mycart" class="{{ request()->is('mycart') ? 'active' : '' }}">  Panier</a>

                <li class=" dropdown">
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        v-pre>
                        {{ Auth::user()->name }} <i class="bi bi-chevron-down"></i></a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @can('admin')
                            <a href="/admin/formation" class="dropdown-item">Dashboard</a>
                        @endcan

                        <livewire:user.components.become-student>
                        
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                    </div>

                </li>
            @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
