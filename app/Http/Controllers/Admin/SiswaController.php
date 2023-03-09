<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Siswa,Kelas,Spp,User};
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DataTables;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $spp   = Spp::all();
        return view('admin.siswa.index', compact('siswa','kelas','spp'));
    }
    public function create(Request $request)
    {
        return view('admin.siswa.create', compact('siswa','kelas','spp'));
    }
    public function store(Request $request)
    {
        $nisn = siswa::where('nisn', $request['nisn'])->get();
        if (sizeof($nisn) == 1) {
            return redirect('siswa')->with(['error' => 'Siswa dengan NISN : '.$request['nisn']. ' sudah ada sebelumnya.']);
        }
        $siswa = Siswa::create([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);
            User::create([
                'id' => $siswa->id,
                'name' => $request->nis,
                'email' => $request->nis."@gmail.com",
                'password' => Hash::make($request->nis),
                'type'     => "0"
        ]);

        return redirect()->route('siswa.index');
    }
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.edit', compact('siswa','kelas','spp'));
    }
    public function show(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect()->route('siswa.index');
    }
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect()->route('siswa.index');
    }
    public function destroy($nisn)
    {
        $siswa = Siswa::find($nisn)->delete();
        return redirect()->route('siswa.index');
    }
}
