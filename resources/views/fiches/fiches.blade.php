@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Fiche d'approvisionnement</h4>
                        @if (auth()->user()->role == 'pharmacist')
                            <a href="{{ route('fiche.create') }}" class="btn btn-round btn-success float-right">
                                Nouvelle demande
                                <i class="nc-icon nc-simple-add"></i>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success text-center msg" id="error">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger text-center msg" id="error">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
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
                                    <th class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($fiches as $fiche)
                                        <tr>
                                            <td class="text-center">
                                                {{ $fiche->no_fiche }}
                                            </td>
                                            <td class="text-capitalize">
                                                {{ App\Models\User::getName($fiche->users_id) }}
                                            </td>
                                            <td class="text-center">
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
