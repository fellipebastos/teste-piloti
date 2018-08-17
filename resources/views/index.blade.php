@extends('_layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Bem-Vindo</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            
            <p>
                <button type="button" class="btn btn-lg btn-primary my-2 mx-1" data-toggle="modal" data-target="#modalLoginForm">Faça Login</button>
                <a href="{{ route('register') }}" class="btn btn-lg btn-secondary my-2 mx-1">Registre-se</a>
            </p>
        </div>
    </section>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                
                @for($i = 0; $i < 3; $i++)
                    <div class="col-md-8 col-lg-4 text-center">
                        <p class="h3">Lorem Ipsum</p>
                        <p class="mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Non reprehenderit dignissimos quia illum eum excepturi quaerat fugit impedit.</p>
                    </div>
                @endfor

            </div>
        </div>
    </div>
@endsection