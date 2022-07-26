<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('pages.admin.profile', [
            'item' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $rules1= [
            'nama' => 'required|string|max:40',
        ];

        $rules2= [
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];

        $rules3= [
            'email' => 'required|string|max:50|email|unique:users'
        ];

        $customMessages = [
            'required' => 'Field :attribute wajib diisi',
            'string' => 'Field :attribute harus berupa string',
            'max' => 'Field :attribute maksimal :max',
            'email' => 'Field :attribute harus berupa email',
            'unique' => 'Field :attribute harus unik',
            'confirmed' => 'Konfirmasi password tidak cocok',
        ];

        $this->validate($request, $rules1, $customMessages);

        if ($request->password) {
            $this->validate($request, $rules2, $customMessages);
        }

        if ($request->email != $user->email) {
            $this->validate($request, $rules3, $customMessages);
        }

        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('profile.edit')->with(['success' => 'Berhasil Mengupdate Profil']);
    }
}
