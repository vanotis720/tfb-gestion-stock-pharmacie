@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Liste des patients</h4>
                        {{-- <a href="{{ route('patients.create') }}" class="btn btn-round btn-success float-right">
                            Ajouter un patient
                            <i class="nc-icon nc-simple-add"></i>
                        </a> --}}
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
                                        Nom
                                    </th>
                                    <th class="text-center">
                                        Genre
                                    </th>
                                    <th class="text-center">
                                        Age
                                    </th>
                                    <th class="text-center">
                                        Statut
                                    </th>
                                    <th class="text-center">
                                        Type
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td class="text-capitalize text-center">
                                                {{ $patient->nom }}
                                            </td>
                                            <td class="text-center">
                                                {{ $patient->sexe == 'm' ? 'Masculin' : 'Féminin' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $patient->age }} Ans
                                            </td>
                                            <td class="text-center text-capitalize">
                                                {{ $patient->statut }}
                                            </td>
                                            <td class="text-center text-capitalize">
                                                {{ $patient->subscription == 0 ? 'non abonné' : 'abonné' }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('ordonnance.create', ['patient' => $patient->id]) }}"
                                                    class="btn btn-info">
                                                    <i class="nc-icon nc-send"></i>
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
