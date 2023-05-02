<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->get(); // Retrieve all project
        return view('users', ['user' => $user]);
    }

    public function destroy (User $user, $id)
    {
        $this->authorize('delete-user', $user);
        $user->find($id)->delete();
        return redirect('/users');
    }
}
