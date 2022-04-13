@extends('templates.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('assets/img/damir-bosnjak.jpg') }}" alt="profile picture">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset($user->avatar) }}" alt="...">
                                <h5 class="title">{{ $user->name }}</h5>
                            </a>
                            <p class="description">
                                {{ $user->email }}
                            </p>
                        </div>
                        <p class="description text-center text-uppercase">
                            @if ($user->role == 'pharmacist')
                                Pharmacien
                            @else
                                {{ $user->role }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Editer Mon Profil</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success text-center msg" id="error">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        @if (session('alert'))
                            <div class="alert alert-info text-center msg" id="error">
                                <strong>{{ session('info') }}</strong>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('account.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Entreprise (disabled)</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Entreprise"
                                            value="Fac.Sciences">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Nom d'utilisateur</label>
                                        <input type="text" class="form-control" name="name" placeholder="Votre nom"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adresse E-mail</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            value="{{ $user->email }}">
                                        @error('email')
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
                                            placeholder="Laissez vide pour garder le mot de passe actuel"
                                            autocomplete="false">
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
                                    <button type="submit" class="btn btn-primary btn-round">Mettre a jour</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
