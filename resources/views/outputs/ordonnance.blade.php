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
                        @if (session('info'))
                            <div class="alert alert-info text-center msg" id="info">
                                <strong>{{ session('info') }}</strong>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('ordonnance.product', $ordonnance->id) }}"
                            autocomplete="off">
                            @csrf
                            <input type="hidden" name="ordonnance_id" value="{{ $ordonnance->id }}">
                            <input type="hidden" name="patient_id" value="{{ $patient }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group autocomplete">
                                        <label>Nom du produit</label>
                                        <select name="produit_id" id="produit_id" class="form-control"
                                            onchange="maxQuantity()" required>
                                            <option selected disabled>Rechercher le produit ici</option>
                                            @foreach (App\Models\Produit::where('quantite', '>=', 1)->get() as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nom . '(Stock: ' . $item->quantite . ' - Exp: ' . $item->expiration . ')' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('produit_id')
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
                                        <label for="price">Prix unitaire</label>
                                        <input type="number" class="form-control" name="price"
                                            placeholder="Renseigner le prix unitaire du produit"
                                            value="{{ old('price') }}" required>
                                        @error('price')
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
                                        <label>Quantité</label>
                                        <input type="number" id="quantity" name="quantite" class="form-control"
                                            placeholder="Renseigner la condition du produit" autocomplete="false" required>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <h4>Détail de l'ordonnance</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Montant(Total)</th>
                                    <th>Expiration</th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($ordonnance_produits as $produit)
                                        <tr>
                                            <td class="font-weight-bold text-capitalize"
                                                style="word-wrap: break-word;min-width: 60px;max-width: 60px;">
                                                {{ $produit->nom }}
                                            </td>
                                            <td>{{ $produit->pivot->quantite }}</td>
                                            <td>{{ $produit->pivot->quantite * $produit->pivot->price }}</td>
                                            <td>{{ $produit->expiration }}</td>
                                            <td>
                                                <a href="{{ route('product.remove', ['ordonnance_id' => $ordonnance->id, 'product_id' => $produit->id]) }}"
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
                                <a href="{{ route('ordonnance.update', ['id' => $ordonnance->id]) }}"
                                    class="btn btn-warning btn-round">
                                    Valider ordonnance et continuer
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('script')
        <script>
            function maxQuantity() {
                $(document).ready(function() {

                    var product_id = document.getElementById("produit_id").value;

                    $.get("/api/product/" + product_id + "/quantity")
                        .done(function(data) {
                            $("#quantity").attr({
                                "max": data,
                                "min": 1
                            });
                        });
                    console.log('called');
                });
            }
        </script>
    @endpush
@endsection
