<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\EditUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

     /**
     * Show the profile edit form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(EditUserFormRequest $request, int $id = null)
    {
        // Caso exsista um id busca o usuário, senão, atribui o usuário logado
        $user = $id ? $this->user->find($id) : auth()->user();

        return view('profile', compact('user'));
    }

     /**
     * Update user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserFormRequest $request, int $id)
    {
        // Filtra inputs nulos
        $data = array_filter($request->all());
        
        // Busca usuário na base de dados
        $user = $this->user->find($id);

        // Atualiza os dados do modelo buscado e salva na base de dados
        $user->fill($data)
             ->save();

        return redirect()->route('profile')
                         ->with('success', 'Profile atualizado com sucesso!');
    }

    /**
     * Delete user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
        if ($request->has('id') && (int) $request->has('id')) {
            $user = $this->user->find($request->input('id'));
        }

        if ($user->delete()) {
            $users = $this->user->all();

            return redirect()->route('panel', compact('users'))
                             ->with('success', 'Profile excluído com sucesso!');
        }
    }

    /**
     * Activate user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate(int $id) {
        $this->user->withTrashed($id)
                   ->where('id', $id)
                   ->restore();

        $users = $this->user->all();
        return redirect()->route('panel', compact('users'))
                         ->with('success', 'Profile reativado com sucesso!');
    }
}
