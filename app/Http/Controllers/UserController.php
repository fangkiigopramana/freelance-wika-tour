<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'perusahaan' => 'required',
        ]);

        // Hash the password using bcrypt
        $hashedPassword = Hash::make($request->password);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO users(nama, email , password, role, perusahaan, created_at) VALUES(:nama, :email, :password, :role, :perusahaan, :created_at)',
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $hashedPassword, // Use the hashed password
                'role' => $request->role,
                'perusahaan' => $request->perusahaan,
                'created_at' => now(),
            ]
        );

        return redirect()->route('user.index')->with('success', 'Data Pelanggan berhasil disimpan');
    }

    public function index()
    {
        $all = User::all();
        $admins = User::where('role','admin')->get();
        $users = User::where('role','user')->get();
        return view('user.index',[
            'all' => $all,
            'admins' => $admins,
            'users' => $users,
        ]);
    }

    public function edit($id)
    {
        $data = DB::table('users')->where('id_user', $id)->first();
        return view('user.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'perusahaan' => 'required',
        ]);

        // Hash the password using bcrypt
        $hashedPassword = Hash::make($request->password);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE users SET nama = :nama, email = :email, password = :password, role = :role, perusahaan = :perusahaan, updated_at = :updated_at WHERE id_user = :id',
            [
                'id' => $id,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $hashedPassword, 
                'role' => $request->role,
                'perusahaan' => $request->perusahaan,
                'updated_at' => now(),
            ]
        );

        return redirect()->route('user.index')->with('success', 'Data tiket berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM users WHERE id_user =:id_user', ['id_user' => $id]);
        return redirect()->route('user.index')->with('success', 'Data peminjam berhasil dihapus');
    }
}
