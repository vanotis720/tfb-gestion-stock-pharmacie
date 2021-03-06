<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('assets/img/faces/undraw_profile.svg') }}">
            </div>
        </a>
        <a href="{{ url('/') }}" class="simple-text logo-normal">
            Gestion de stock
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            {{-- admin specific action --}}
            @if (auth()->user()->role == 'admin')
                <li class="{{ Request::is('user*') ? 'active' : '' }}">
                    <a href="{{ route('users.list') }}">
                        <i class="nc-icon nc-badge"></i>
                        <p>Gestion des utilisateurs</p>
                    </a>
                </li>
            @endif

            <li class="{{ Request::is('fiche*') ? 'active' : '' }}">
                <a href="{{ route('fiches.list') }}">
                    <i class="nc-icon nc-cart-simple"></i>
                    <p>Demande d'approvisionnement</p>
                </a>
            </li>

            {{-- pharmacist specific action --}}
            @if (auth()->user()->role == 'pharmacist')
                <li class="{{ Request::is('patient*') ? 'active' : '' }}">
                    <a href="{{ route('patients.index') }}">
                        <i class="nc-icon nc-send"></i>
                        <p>Sortie des produits</p>
                    </a>
                </li>
                <li class="{{ Request::is('ordonnances/*') ? 'active' : '' }}">
                    <a href="{{ route('ordonnances', 'caisse') }}">
                        <i class="nc-icon nc-tag-content"></i>
                        <p>Ordonnance en attente</p>
                    </a>
                </li>
            @endif

            {{-- pharmacist specific action --}}
            @if (auth()->user()->role == 'caisse')
                <li class="{{ Request::is('recu') ? 'active' : '' }}">
                    <a href="{{ route('recu.index') }}">
                        <i class="nc-icon nc-tag-content"></i>
                        <p>Ordonnance en attente</p>
                    </a>
                </li>
            @endif

            <hr>
            <li class="{{ Request::is('account') ? 'active' : '' }}">
                <a href="{{ route('account') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Mon Profil</p>
                </a>
            </li>
        </ul>
    </div>
</div>
