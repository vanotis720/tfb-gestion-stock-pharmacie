@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
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
                                        <td>
                                            @include('templates.status')
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Prix total(CDF)</td>
                                        <td>{{ App\Models\Facture::getPrice($fiche->id) }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4>Produits</h4>
                            <table class="table">
                                <tbody>
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
                                    <form method="POST" action="{{ route('fiche.updateProduct', $fiche->id) }}">
                                        @csrf
                                        <div class="row">
                                            @foreach ($products as $produit)
                                                <tr>
                                                    <td class="font-weight-bold text-capitalize"
                                                        style="word-wrap: break-word;min-width: 60px;max-width: 60px;">
                                                        {{ $produit->nom }}
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <label>Date d'expiration</label>
                                                            <input type="date" class="form-control" name="{{ $produit->id }}"
                                                                placeholder="Renseigner la date" required>
                                                            @error('expiration')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="update ml-auto mr-auto">
                                                        <button type="submit" class="btn btn-primary btn-round">
                                                            Valider
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </div>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
