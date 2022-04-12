@include('templates.header')

<div class="wrapper ">
    @include('templates.menu')
    <div class="main-panel">
        <!-- Navbar -->
        @include('templates.nav')
        <!-- End Navbar -->

        @yield('content')
        
        @include('templates.copyright')
    </div>
</div>

@include('templates.footer')
