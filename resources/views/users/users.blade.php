@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des utilisateurs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class=" text-primary">
                                    <th>
                                        Nom complet
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Role
                                    </th>
                                    <th class="text-center">
                                        Avatar
                                    </th>
                                    {{-- <th class="text-center">
                                        Action
                                    </th> --}}
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-capitalize">
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                {{ $user->role }}
                                            </td>
                                            <td>
                                                <img class="avatar border-gray" src="{{ asset($user->avatar) }}"
                                                    alt="avatar user">
                                            {{-- </td>
                                            <td class="text-center">
                                                <a target="_blank"
                                                    href=""
                                                    class="btn btn-round btn-success">
                                                    Modifier
                                                    <i class="nc-icon nc-send"></i>
                                                </a>
                                            </td> --}}
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
