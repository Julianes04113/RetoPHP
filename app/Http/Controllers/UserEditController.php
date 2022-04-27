<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UserEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Request $request): View
    {
        return view('Profile.edit')->with([
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();

            $user->fill($request->validated());

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
            }

            $user->save();

            if ($request->hasFile('image')) {
                if ($user->image != null) {
                    Storage::disk('images')->delete($user->image->path);
                    $user->image->delete();
                }

                $path = $request->image->store('users', 'image');

                $user->image()->create([
                    'path' => $path,
                ]);
            }

            return redirect()->route('Profile')->with('success', 'Perfil Editado Correctamente');
        }, 5);
    }
}
