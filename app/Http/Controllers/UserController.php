<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\Roles;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('management.users-management', compact('users'));
    }

    public function nominate(User $user) {

        $user->update([
            'role' =>  Roles::ADMIN->value
        ]); 

       return redirect()->route('users-management')->with('success', "$user->name est desormais Administrateur"); 
    }


    public function denominate(User $user) {

        $user->update([
            'role' =>  Roles::USER->value
        ]); 

       return redirect()->route('users-management')->with('success', "$user->name n'est plus un Administrateur"); 
    }
}
