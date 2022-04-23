<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Admin\StoreUserRequest;

class AdminController extends Controller
{
    public function index(): View
    {
        $users=User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function show($user): View
    {
        $user = User::findOrFail($user);
        return view('users.show')->with(['user'=> $user]);
    }

    public function edit($user): View
    {
        $user = User::findOrFail($user);
        return view('users.edit')->with(['user'=> $user]);
    }

    public function update(StoreUserRequest $request, User $user): RedirectResponse
    {
        $user= User::findOrFail($user);
        $user->save(request($request)->validated());
        return redirect()->back()->with('success', 'Bien Tontolín, te quedo editado bien esta mondá');
    }
}
