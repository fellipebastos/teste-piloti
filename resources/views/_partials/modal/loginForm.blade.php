<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <p class="h1 text-center">Login</p>
                <p class="h5 text-center text-muted mb-4">Informe seus dados para entrar.</p>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form method="POST" action="{{ route('login') }}" aria-label="Login">
                            @csrf

                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>