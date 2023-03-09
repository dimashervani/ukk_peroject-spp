<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $spp = Spp::all();
        return view('admin.spp.index', compact('spp'));
    }
    public function create(Request $request)
    {
        return view('admin.spp.create');
    }
    public function store(Request $request)
    {
        $spp = Spp::create([
            'id_spp' => $request->id_spp,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('spp.index');
    }
    public function edit($id_spp)
    {
        $spp = Spp::findOrFail($id_spp);
        return view('admin.spp.edit', compact('spp'));
    }
    public function update(Request $request, $id)
    {
        $spp = Spp::findOrFail($id);
        $spp->update($request->all());
        return redirect()->route('spp.index');
    }
    public function show(Request $request, $id)
    {
        $spp = Spp::findOrFail($id);
        $spp->update($request->all());
        return redirect()->route('spp.index');
    }
    public function destroy($id)
    {
        $spp = Spp::find($id);
        $spp->delete();

        return redirect()->route('spp.index');
    }
}
