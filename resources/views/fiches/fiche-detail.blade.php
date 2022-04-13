@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Fiche no: {{ $fiche->no_fiche }}</h4>
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
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            {{ $fiche->no_fiche }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ App\Models\User::getName($fiche->users_id) }}
                                        </td>
                                        <td class="text-center">
                                            {{ $fiche->status }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
