<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\StoreUserRequest;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

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
        
        if ($request->admin_since != null) {
            $user->forceFill([
                'admin_since' => now(),
            ]);
            $user->assignRole('admin');
        } else {
            $user->forceFill([
                'admin_since' => null
            ]);
            $user->assignRole('customer');
        }

        if ($request->disabled_at != null) {
            $user->forceFill([
                'disabled_at' => now(),
            ]);
        } else {
            $user->forceFill([
                'disabled_at' => null
            ]);
        }

        $user->save();
        
        return redirect()->back()->with('success', 'Bien Tontolín, te quedo editado bien esta mondá');
    }
}
