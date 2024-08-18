<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }

    public function edit(user $user): View
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $profile)
    {
        $profile->update([
            'name' => $request->name,
        ]);

        // check if the request has a file
        if ($request->hasFile('avatar')) {
            // delete the old image
            Storage::disk('public')->delete(Str::remove('storage/', $profile->avatar));

            $avatar = Image::make($request->file('avatar'))
                ->resizeCanvas(400, 400);

            // store the file
            $avatar->save(storage_path('app/public/avatars/'.Str::random(40).'.jpg'));

            $profile->update([
                'avatar' => '/storage/avatars/'.$avatar->basename,
            ]);
        }

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return RedirectResponse
     */
    public function destroy(user $user): RedirectResponse
    {
        $user->delete();

        Auth::logout();

        return redirect()->route('welcome');
    }
}
