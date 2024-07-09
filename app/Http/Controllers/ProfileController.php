<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile_edit($id)
    {
        $user = User::find($id);
        return view('profile_edit', compact('user'));
    }

    public function profile_update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $request->validate([
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'avatar' => 'nullable|image|max:1048'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->hasFile('avatar')) {
            // 古いアバターの削除
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // 新しいアバターの保存
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('myrecipe', Auth::user()->id)->with('success', 'Profile updated successfully!');
    }
}
