@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Connexion</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez votre email" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrez votre mot de passe" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    <p class="mt-3 text-center">Pas encore inscrit? <a href="{{ route('register') }}">S'inscrire</a></p>
</div>
@endsection
