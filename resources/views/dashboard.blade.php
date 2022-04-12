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
                                    <p class="card-category">Applications</p>
                                    <p class="card-title">
                                        {{-- {{ App\Models\Applicant::count() }} --}}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            Update Now
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
                                    <p class="card-category">Contacts</p>
                                    <p class="card-title">
                                        {{-- {{ App\Models\Contact::count() }} --}}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>
                            Last day
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Contacts</h5>
                        <p class="card-category">Liste des contacts</p>
                    </div>
                    <div class="card-body ">
                        <canvas id="chartContact" height="100"></canvas>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-danger"></i> Nouveau
                            <i class="fa fa-circle text-primary"></i> Ouvert
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar"></i> Nombre des contacts du site
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-title">Applications</h5>
                        <p class="card-category">Applications par mois</p>
                    </div>
                    <div class="card-body">
                        <canvas id="chartApplicant" width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-danger"></i> applications
                        </div>
                        <hr />
                        <div class="card-stats">
                            <i class="fa fa-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        var contact_init = {{ App\Models\Contact::count('init') }};
        var contact_treated = {{ App\Models\Contact::count('treated') }};
        var applications = {{ json_encode(App\Models\Applicant::statsMonth()) }}
    </script> --}}
@endsection
