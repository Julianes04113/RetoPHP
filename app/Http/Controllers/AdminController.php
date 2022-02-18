<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Resources\views\Users\edit;

class AdminController extends Controller
{
    public function index()
    {
        $userslist = User::all();
        return view('users.index', compact('userslist'));
    }

public function show($user)
    {
       $user = User::findOrFail($user);
       return view('users.show')->with([
        'user'=> $user,   
       ]);
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        return view('users.edit')->with([
            'user'=> $user,
            ]);
    }

    public function update($user){
     
        $user= User::findOrFail($user);
        $user->update(request()->all());
        return view('users.edited');
         }
}
