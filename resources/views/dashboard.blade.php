@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Produits</p>
                                    <p class="card-title">
                                        {{ App\Models\Produit::count() }}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            Mise a jour permanente
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-send text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Utilisateurs</p>
                                    <p class="card-title">
                                        {{ App\Models\User::count() }}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>
                            Mise a jour permanente
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Dernieres fiches d'approvisionnement</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class=" text-primary">
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">
                                        Demander Par
                                    </th>
                                    <th class="text-center">
                                        Status
                                    </th>
                                    <th>
                                        Prix Total(CDF)
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach (App\Models\Fiche::getLast(3) as $fiche)
                                        <tr>
                                            <td class="text-center">
                                                {{ $fiche->no_fiche }}
                                            </td>
                                            <td class="text-capitalize">
                                                {{ App\Models\User::getName($fiche->users_id) }}
                                            </td>
                                            <td class="text-center">
                                                @include('templates.status')
                                            </td>
                                            <td>
                                                {{ App\Models\Facture::getPrice($fiche->id) }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('fiche.detail', $fiche->id) }}" class="btn btn-info">
                                                    Details
                                                    <i class="nc-icon nc-single-copy-04"></i>
                                                </a>
                                            </td>
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
