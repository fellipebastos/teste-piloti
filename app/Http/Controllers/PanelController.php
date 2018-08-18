<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Show the application panel index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = $user->all();
        $usersDeleted = $user->onlyTrashed()->get();

        return view('panel', compact('users', 'usersDeleted'));
    }
}
