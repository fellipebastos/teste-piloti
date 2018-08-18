<div class="table-responsive">
    <table class="table table-hover bg-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuário</th>
                <th scope="col">E-mail</th>
                <th scope="col">Admin</th>
                <th scope="col">Criado</th>
                <th scope="col">Atualizado</th>
                
                @if ($users->first()->deleted_at)
                    <th scope="col">Excluído</th>
                @endif
                
                <th scope="col" style="min-width: 135px;">Ação</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->isAdmin() ? 'Sim' : 'Não' }}</td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                    
                @if ($user->deleted_at)
                    <td>{{ $user->deleted_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="{{ route('profile.activate', $user->id) }}" title="Ativar Usuário">Ativar</a>
                    </td>
                @else
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('profile', $user->id) }}" title="Editar Usuário">Editar</a>
                        <button class="btn btn-sm btn-danger j-deleteBtn" type="button" data-toggle="modal" data-target="#modalDelete" data-id="{{ $user->id }}">Excluir</button>
                    </td>
                @endif
            </tr>
            @endforeach

            @if(!empty($users) && !$users->first()->deleted_at)
                @include('_partials.modal.deleteModal', [
                    'modal_title'           =>  'Excluir',
                    'modal_text'            =>  '<b>Você realmente desea excluir este usuário?</b><br>Esta operação não poderá ser desfeita.',
                    'modal_btn_text'     =>  'Excluir',
                ])
            @endif
        </tbody>
    </table>
</div>