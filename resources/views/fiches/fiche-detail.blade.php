@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title float-left">Détail Fiche no: {{ $fiche->no_fiche }}</h5>
                        @include('fiches.action')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (session('error'))
                                <div class="alert alert-danger text-center msg" id="error">
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">Num. Fiche</td>
                                        <td>{{ $fiche->no_fiche }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">Demander Par</td>
                                        <td class="text-capitalize">{{ App\Models\User::getName($fiche->users_id) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">Prix total(CDF)</td>
                                        <td>{{ App\Models\Facture::getPrice($fiche->id) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">Statuts</td>
                                        <td>
                                            @include('templates.status')
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4>Produits</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Produit</th>
                                    <th>Categorie</th>
                                    <th>Condition</th>
                                    <th>Quantite</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $produit)
                                        <tr>
                                            <td class="font-weight-bold text-capitalize"
                                                style="word-wrap: break-word;min-width: 60px;max-width: 60px;">
                                                {{ $produit->nom }}
                                            </td>
                                            <td>{{ $produit->categorie }}</td>
                                            <td>{{ $produit->condition }}</td>
                                            <td>{{ $produit->quantite }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
