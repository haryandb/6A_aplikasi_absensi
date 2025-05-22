<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('admin.pengguna.index');
    }

    public function insert()
    {
        return view('admin.pengguna.insert');
    }

    public function store(Request $request)
    {
        $validData = collect($request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
        ]));

        $validData['password'] = bcrypt($validData['password']);

        $user = User::create($validData->toArray());

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }
}
