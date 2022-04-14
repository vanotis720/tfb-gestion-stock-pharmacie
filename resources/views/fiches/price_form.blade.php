@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Determiner le prix total de la fiche</h5>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger text-center msg" id="error">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success text-center msg" id="success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('fiche.update', $fiche->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Prix total(cdf)</label>
                                        <input type="number" class="form-control" name="price"
                                            placeholder="Renseigner le prix total en CDF" value="{{ old('price') }}" required>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Ajouter et
                                        Envoyer a la caisse</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Detail Fiche</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Num. Fiche</td>
                                        <td>{{ $fiche->no_fiche }}</td>
                                    </tr>
                                    <tr>
                                        <td>Statuts</td>
                                        <td>{{ $fiche->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Prix total(CDF)</td>
                                        <td>{{ $fiche->price ?? 'non defini' }}</td>
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
                                    <th class="text-center">
                                        Action
                                    </th>
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
                                            <td>
                                                <a href="{{ route('product.destroy', ['id' => $produit->id, 'fiche' => $fiche->id]) }}"
                                                    class="btn btn-danger">
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <a href="{{ route('fiche.action', ['id' => $fiche->id, 'action' => 'admin', 'route' => 'fiche.create']) }}"
                                    class="btn btn-warning btn-round">
                                    Valider la fiche
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
