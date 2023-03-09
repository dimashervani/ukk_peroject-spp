<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $petugas = User::all();
        return view('admin.petugas.index', compact('petugas'));
    }
    public function create(Request $request)
    {
        return view('petugas.create');
    }
    public function store(Request $request)
    {
        $petugas = User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'type' => '2'
        ]);

        return redirect()->route('petugas.index');
    }
    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('kelas'));
    }
    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->except(['_token', 'submit']));

        return view('admin.petugas.index', compact('petugas'));
    }
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();

        return redirect()->route('petugas.index');
    }
}
