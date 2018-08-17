<form method="POST" action="{{ route('login') }}" aria-label="Login">
    @csrf

    <div class="form-group">
        <div class="input-group input-group-lg">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="input-group input-group-lg">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                Lembrar-me
            </label>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-primary w-100">
            Acessar
        </button>
    </div>
    <p class="text-center">
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Esqueceu a senha?
        </a>
    </p>
</form>