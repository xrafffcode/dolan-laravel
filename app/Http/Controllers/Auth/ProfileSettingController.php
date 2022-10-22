<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileSettingController extends Controller
{
    public function edit()
    {
        return view('auth.profile-setting', [
            'user' => User::findOrFail(Auth::user()->id)
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $user = User::where('id', $request->id)->first();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store(
                'assets/user',
                'public'
            );
            if ($user->image != null) {
                Storage::disk('public')->delete($user->image);
            }
        }

        try {
            $user->update($data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Profile berhasil diupdate');
    }
}
