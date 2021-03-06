<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Gestion de stock Pharmacie</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" id="notification">
                        <i class="nc-icon nc-bell-55"></i>
                        <span class="notification">{{ App\Models\Produit::checkExpiration()->count() }}</span>
                        <span class="d-lg-none">Notification</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notification">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Produit</td>
                                    <td>Expiration</td>
                                    <td>Quantite</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Produit::checkExpiration() as $item)
                                    <tr>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->expiration }}</td>
                                        <td>{{ $item->quantite }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </ul>
                </li>
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('account') }}" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-circle-10"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Mon compte</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('account') }}">Mon profil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Me deconnecter</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
