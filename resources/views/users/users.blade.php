@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">Liste des utilisateurs</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-round btn-success float-right">
                            Ajouter un utilisateur
                            <i class="nc-icon nc-simple-add"></i>
                        </a>
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
                                        Nom complet
                                    </th>
                                    <th class="text-center">
                                        Email
                                    </th>
                                    <th class="text-center">
                                        Role
                                    </th>
                                    <th class="text-center">
                                        Avatar
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">
                                                {{ ++$i }}
                                            </td>
                                            <td class="text-capitalize">
                                                {{ $user->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $user->email }}
                                            </td>
                                            <td class="text-center">
                                                {{ $user->role }}
                                            </td>
                                            <td class="text-center">
                                                <img class="avatar border-gray" src="{{ asset($user->avatar) }}"
                                                    alt="avatar user">
                                            </td>
                                            <td class="text-center">
                                                @if ($user->id == auth()->user()->id)
                                                    <i class="nc-icon nc-check-2"></i>
                                                @else
                                                    <a target="_blank" href="{{ route('users.destroy', $user->id) }}"
                                                        class="btn btn-danger">
                                                        <i class="nc-icon nc-simple-remove"></i>
                                                    </a>
                                                @endif
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
