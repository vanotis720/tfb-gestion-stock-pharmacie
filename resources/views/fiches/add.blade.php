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
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nom du produit</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Renseigner le nom du produit" value="{{ old('name') }}" required>
                                        @error('name')
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
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Renseigner la catégorie du produit" value="{{ old('email') }}" required>
                                        @error('email')
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
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Renseigner la condition du produit" autocomplete="false">
                                        @error('password')
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
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Renseigner la quantité" autocomplete="false">
                                        @error('password')
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
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $fiche->no_fiche }}</td>
                                        <td>{{ $fiche->no_fiche }}</td>
                                        <td>{{ $fiche->no_fiche }}</td>
                                        <td>{{ $fiche->no_fiche }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-warning btn-round">
                                        Valider la fiche
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
