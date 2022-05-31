@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Ordonnance en attente de validation</h4>
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
                                        Nom Patient
                                    </th>
                                    <th class="text-center">
                                        Date de prescription
                                    </th>
                                    <th class="text-center">
                                        Montant total
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($ordonnances as $ordonnance)
                                        <tr>
                                            <td class="text-capitalize text-center">
                                                {{ $ordonnance->id }}
                                            </td>
                                            <td class="text-capitalize text-center">
                                                {{ $ordonnance->patient->nom }}
                                            </td>
                                            <td class="text-center">
                                                {{ $ordonnance->datePrescription }}
                                            </td>
                                            <td class="text-center text-capitalize">
                                                {{ App\Models\Ordonnance::totalPrice($ordonnance->id) }} CDF
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('ordonnance.update', ['id' => $ordonnance->id]) }}"
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
