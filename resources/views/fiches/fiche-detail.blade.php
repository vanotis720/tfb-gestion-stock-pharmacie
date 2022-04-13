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
                                        <td class="font-weight-bold text-capitalize">Statuts</td>
                                        <td>
                                            @if ($fiche->status == 'admin')
                                                <h6>
                                                    <span class="badge badge-warning"> En attente de
                                                        l'administrateur</span>
                                                </h6>
                                            @elseif ($fiche->status == 'caisse')
                                                <h6>
                                                    <span class="badge badge-warning"> En attente de la caisse</span>
                                                </h6>
                                            @elseif ($fiche->status == 'pharmacist')
                                                <h6>
                                                    <span class="badge badge-warning"> En attente du pharmacien</span>
                                                </h6>
                                            @elseif ($fiche->status == 'solved')
                                                <h6>
                                                    <span class="badge badge-warning"> Acheter, en attende de
                                                        validation</span>
                                                </h6>
                                            @elseif ($fiche->status == 'validated')
                                                <h6>
                                                    <span class="badge badge-success"> Valider, Ajouter au stock</span>
                                                </h6>
                                            @elseif ($fiche->status == 'rejected')
                                                <h6>
                                                    <span class="badge badge-danger"> Demande refuser</span>
                                                </h6>
                                            @endif
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
