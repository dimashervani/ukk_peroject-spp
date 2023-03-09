<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Datatables\Datatables;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index',compact('kelas'));
    }
    // public function getkelas(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Kelas::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row){
    //                 $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    // }
    public function create(Request $request)
    {
        return view('admin.kelas.create');
    }
    public function store(Request $request)
    {
        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect()->route('kelas.index');
    }
    public function edit($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        return view('admin.kelas.edit', compact('kelas'));
    }
    public function update(Request $request, $id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $kelas->update($request->all());
        return redirect()->route('kelas.index');

    }
    public function show(Request $request, $id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $kelas->update($request->all());
        return redirect()->route('kelas.index');
    }
    public function destroy($id_kelas)
    {
        $kelas = Kelas::where('id_kelas', $id_kelas)->delete();

        return redirect()->route('kelas.index', compact('kelas'));
    }
}
