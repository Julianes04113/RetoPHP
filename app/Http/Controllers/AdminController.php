<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\StoreUserRequest;

class AdminController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function show($user): View
    {
        $image = Auth::user()->profile_image;
        $user = User::findOrFail($user);
        return view('users.show')->with([
            'user' => $user,
            'image' => $image,
        ]);
    }

    public function edit($user): View
    {
        $user = User::findOrFail($user);
        $image = Auth::user()->profile_image;
        return view('users.edit')->with([
            'user' => $user,
            'image' => $image,
        ]);
    }

    public function update(StoreUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated()); //forceFill para obligar a no usar fillable en admin_since
        return redirect()->back()->with('success', 'Bien Tontolín, te quedo editado bien esta mondá');
    }
}
