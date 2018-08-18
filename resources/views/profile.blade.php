@extends('_layouts.app')

@section('content')
<section class="py-4">
    <div class="container">
        <h1>Seu Perfil</h1>

        @if (session('success'))
            @include('_partials.alert', ['alert_type' => 'success'])
        @endif
        
        <hr>

        <form action="{{ route('profile.update', $user->id) }}" method="post">
            @csrf

            <div class="form-group">
                <label class="label" for="name">Nome:</label>
                <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') ?? $user->name }}" placeholder="Informe seu nome" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') ?? $user->email }}" placeholder="Informe seu e-mail" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="accordion" id="accordionPasswordChange">
                <div id="headingPassword">
                    <button  class="btn btn-link p-0 mb-3" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="{{ $errors->first('password') ? 'true' : 'false' }}" aria-controls="collapsePassword">
                        <b>Alterar Senha</b>
                    </button>
                </div>

                <div id="collapsePassword" class="collapse {{ $errors->first('password') ? 'show' : '' }}" aria-labelledby="headingPassword" data-parent="#accordionPasswordChange">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="password">Senha:</label>
                                <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" value="" placeholder="Informe sua nova senha">
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="password-confirm">Confirmar Senha:</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if (auth()->user()->isAdmin())
            <div class="form-group">
                <div class="form-check">
                    <input id="permission" class="form-check-input" type="checkbox" name="permission" value="true" {{ $user->isAdmin() ? 'checked' : '' }}>
                    <label class="fomr-check-label" for="permission">É admin?</label>
                </div>
            </div>
            @endif

            <hr>
            <button class="btn btn-lg btn-success" type="submit">Salvar</button>
        </form>
    </div>
</section>
@endsection