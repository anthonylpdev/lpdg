@extends('layouts.app')

@section('title', 'Connexion')

@section('body-class', 'login')

@section('content')
    <section class="form">
        <span class="lpdg-logo">L</span>
        <span class="logo">LPDG</span>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1>Se connecter à LPDG</h1>
            <span class="sentence">Veuillez saisir votre email et mote de passe</span>

            <div class="form-group">
                <label class="label" for="email">email</label>
                <input id="email"
                       placeholder="Adresse email"
                       type="email"
                       class="input @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="password-part">
                    <label class="label" for="password">Mot de passe</label>
                    @if (Route::has('password.request'))
                        <a class="forgot" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                </div>

                <input id="password"
                       placeholder="Mot de passe"
                       type="password"
                       class="input @error('password') is-invalid @enderror" name="password" required
                       autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="remember-part">
                <input type="checkbox"
                       name="remember"
                       class="icon-radio checkbox-version"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn">Connexion</button>

        </form>
    </section>
@endsection
