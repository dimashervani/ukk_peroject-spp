<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Siswa , Spp  , Pembayaran, User , Kelas};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\PembayaranExport;
use App\Imports\PembayaranImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;

class PembayaranController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return Excel::download(new PembayaranExport, 'Pembayaran.xlsx');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function import() 
    // {
    //     Excel::import(new UsersImport,request()->file('file'));
               
    //     return back();
    // }

    public function index()
    {
        $pembayaran = Pembayaran::all();
        $users = User::all();
        $spps= Spp::all();
        $siswas= Siswa::all();
        
        return view('admin.pembayaran.index' , compact('pembayaran','spps','siswas','users'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $siswa = DB::table('siswa')
        ->join('spp' , 'siswa.id_spp' , '=' , 'spp.id')
        ->get();
        return view('admin.pembayaran.create' , compact('siswa'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|numeric',
            'jumlah_bayar' => 'required|numeric',
        ]);


        // dd($request->bayar_berapa);
        for ($i = 0; $i < $request->bayar_berapa; $i++) {
            $bulan = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

            $siswa = Siswa::where('nisn', '=', $request->nisn)->first();
            $spp = Spp::where('id', '=', $siswa->id_spp)->first();
            $pembayaran = Pembayaran::where('nisn', '=', $siswa->nisn)->get();

            if ($pembayaran->isEmpty()) {
                $bln = 6;
                $tahun = substr($spp->tahun, 0, 4);
            } else {
                $pembayaran = Pembayaran::where('nisn', '=', $siswa->nisn)
                    ->orderBy('id', 'Desc')->latest()
                    ->first();

                $bln = array_search($pembayaran->bulan_dibayar, $bulan);

                if ($bln == 11) {
                    $bln = 0;
                    $tahun = $pembayaran->tahun_dibayar + 1;
                } else {
                    $bln = $bln + 1;
                    $tahun = $pembayaran->tahun_dibayar;
                }

                if ($pembayaran->tahun_dibayar == substr($spp->tahun, -4, 4) && $pembayaran->bulan_dibayar == 'mei') {
                    return back()->with('error', 'sudah lunas');
                }
            }

            if ($request->jumlah_bayar < $spp->nominal) {
                return back()->with('tjumlah_bayar', 'Uang yang dimasukan tidak sesuai');
            }

            $pembayaranSimpan = Pembayaran::create([
                'id_petugas' => auth()->user()->id,
                'nisn' => $request->nisn,
                'tgl_bayar' => Carbon::now(),
                'bulan_dibayar' => $bulan[$bln],
                'tahun_dibayar' => $tahun,
                'id_spp' => $spp->id,
                'jumlah_bayar' => $request->jumlah_bayar 
            ]);
        }

        if ($pembayaranSimpan) {
            return redirect()->route('print.pdf' , $pembayaran->nisn)->with('success', 'data berhasil masuk');
        } else {
            return redirect()->back()->with('error', 'data gagal masuk');
        }
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id,siswa $nisn)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $users = User::all();
        $spps= Spp::all();
        $siswas= Siswa::all();
        return view('admin.pembayaran.show' , compact('pembayaran','users','spps','siswas'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getData($nisn , $berapa)
    {
        // $siswa = Siswa::where('nisn', $nisn)->first();
        $siswa = Siswa::where('nisn', '=', $nisn)->first();
        $spp = Spp::where('id', '=', $siswa->id_spp)->first();
        $pembayaran = Pembayaran::where('nisn', '=', $nisn)
            ->orderBy('id', 'Desc')->latest()
            ->first();

        if ($pembayaran == null) {
            $data = [
                'nominal' => $spp->nominal * $berapa,
                'bulan' => 'belum pernah bayar',
                'tahun' => '',
            ];
        } else {

            if ($pembayaran->tahun_dibayar == substr($spp->tahun, -4, 4) && $pembayaran->bulan_dibayar == 'juni') {
                $data = [
                    'nominal' => $spp->nominal * $berapa,
                    'bulan' => 'sudah lunas',
                    'tahun' => '',
                ];
            } else {
                $data = [
                    'nominal' => $spp->nominal * $berapa,
                    'bulan' => $pembayaran->bulan_dibayar,
                    'tahun' => $pembayaran->tahun_dibayar,
                ];
            }
        }

        return response()->json($data);
    }
    
    public function generatePDF($nisn)
    {
        $data    = Pembayaran::where('nisn' , '=' , $nisn)->first();
        // dd($data);
        $siswa   = Siswa::where('nisn', '=', $nisn)->first();
        // dd($siswa);
        $spp     = Spp::where('id', '=', $siswa->id_spp)->first();
        // dd($spp);
        $invoice =  Pembayaran::where('created_at' , '=' ,  $data->created_at)->get();
        // dd($invoice);
        $pdf     = PDF::loadView('myPDF' , compact('data' , 'siswa' , 'spp' , 'invoice'));
        // dd($pdf);
        return $pdf->download('spp.pdf');
        // return view('myPDF', compact('data' , 'siswa','invoice','spp'));
        if ($pdf) {
            return redirect()->route('pembayaran.index')->with('success', 'data berhasil masuk');
        } else {
            return redirect()->back()->with('error', 'gagal');
        }
    }

}