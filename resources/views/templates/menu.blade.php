<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('assets/img/logo/logo-circle.png') }}">
            </div>
        </a>
        <a href="{{ url('/') }}" class="simple-text logo-normal">
            {{-- Light of the World --}}
            <div class="logo-image-big">
                <img src="{{ asset('assets/img/logo/logo.png') }}">
            </div>
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
            
            <li class="{{ Request::is('account') ? 'active' : '' }}">
                <a href="{{ route('account') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Mon Profil</p>
                </a>
            </li>
        </ul>
    </div>
</div>
