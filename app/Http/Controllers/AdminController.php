<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Resources\views\Users\index;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Image;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
       $userSearch=trim($request->get('UserSearchBar'));
       
       $searched = User::select('name','email','admin_since','disabled_at')
            ->ufilter($userSearch)
            ->orderBy('id','asc')
            ->paginate(5);
    return view('users.index', compact('userSearch','searched'));
    }

public function show($user): View
    {
       $user = User::findOrFail($user);
       return view('users.show')->with(['user'=> $user]);
    }

    public function edit($user): View
    {
        $user = User::findOrFail($user);
        return view('users.edit')->with(['user'=> $user,User::findOrFail($user)]);
    }

    public function update($user){
     // agregar validador usuario
        $user= User::findOrFail($user);
        $user->update(request()->all());
       return redirect()->back()->with('success','Bien Tontolín, te quedo editado bien esta mondá');
         }
}
