@extends('_layouts.app')

@section('content')
<section class="py-4">
    <div class="container">
        <h1>Lista de Usuários</h1>

        @if (session('success'))
            @include('_partials.alert', ['alert_type' => 'success'])
        @endif

        <hr>

        <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="users-tab" data-toggle="pill" href="#users" role="tab" aria-controls="users" aria-selected="true">Usuários Ativos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="users-deleted-tab" data-toggle="pill" href="#users-deleted" role="tab" aria-controls="users-deleted" aria-selected="false">Usuários Excluidos</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                @if (!$users->isEmpty())
                    @include('_partials.table.userTable', ['users' => $users])
                @else
                    @include('_partials.alert', [
                        'alert_type'    =>  'info',
                        'alert_text'    =>  'Não existem registros para serem exibidos.'
                    ])
                @endif
            </div>

            <div class="tab-pane fade" id="users-deleted" role="tabpanel" aria-labelledby="users-deleted-tab">
                @if (!$usersDeleted->isEmpty())
                    @include('_partials.table.userTable', ['users' => $usersDeleted])
                @else
                    @include('_partials.alert', [
                        'alert_type'    =>  'info',
                        'alert_text'    =>  'Não existem registros para serem exibidos.'
                    ])
                @endif
            </div>
        </div>
    </div>

    <form id="deleteForm" action="{{ route('profile.delete') }}" method="post">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id">
    </form>
</section>
@endsection