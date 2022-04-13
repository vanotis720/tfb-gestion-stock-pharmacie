@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Ajouter les produits</h5>
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
                        <form method="POST" action="{{ route('product.store') }}">
                            @csrf
                            <input type="hidden" name="fiches_id" value="{{ $fiche->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nom du produit</label>
                                        <input type="text" class="form-control" name="nom"
                                            placeholder="Renseigner le nom du produit" value="{{ old('nom') }}" required>
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Catégorie du produit</label>
                                        <input type="text" class="form-control" name="categorie"
                                            placeholder="Renseigner la catégorie du produit"
                                            value="{{ old('categorie') }}" required>
                                        @error('categorie')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Condition du produit</label>
                                        <input type="text" name="condition" class="form-control"
                                            placeholder="Renseigner la condition du produit" autocomplete="false">
                                        @error('condition')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Quantité a commander</label>
                                        <input type="text" name="quantite" class="form-control"
                                            placeholder="Renseigner la quantité" autocomplete="false">
                                        @error('quantite')
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
                                        continuer</button>
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
                                    @foreach ($produits as $produit)
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
                                <a href="{{ route('fiche.update', $fiche->id) }}" class="btn btn-warning btn-round">
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
