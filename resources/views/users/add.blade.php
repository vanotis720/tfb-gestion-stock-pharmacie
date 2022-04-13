@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Renseigner les informations</h5>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger text-center msg" id="error">
                                <strong>{{ session('error') }}</strong>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nom de l'utilisateur</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Renseigner le nom" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adresse E-mail</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Renseigner l'adresse Email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option selected disabled>Choisir un role</option>
                                            <option value="admin">Administration</option>
                                            <option value="caisse">Caisse</option>
                                            <option value="pharmacist">Pharmacie</option>
                                        </select>
                                        @error('role')
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
                                        <label>Mot de passe</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Renseigner le mot de passe" autocomplete="false">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Valider et ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
