<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $penggunas = User::where('name', 'like', '%' . $request->s . '%')->paginate(10);

        return view('admin.pengguna.index', compact('penggunas'));
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

    public function insert()
    {
        return view('admin.pengguna.insert');
    }

    public function edit($id)
    {
        $pengguna = User::findOrFail($id);

        return view('admin.pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);

        $validData = collect($request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $pengguna->id,
            'password' => 'nullable|confirmed',
        ]));

        if ($validData['password']) {
            $validData['password'] = bcrypt($validData['password']);
        } else {
            unset($validData['password']);
        }

        $pengguna->update($validData->toArray());

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
