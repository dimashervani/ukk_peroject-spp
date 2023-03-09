<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function collection()
    {
        return Pembayaran::select("id", "id_petugas", "nisn", "tgl_bayar", "bulan_dibayar", "tahun_dibayar", "id_spp", "jumlah_bayar", "created_at", "updated_at")->get();
    }
    public function headings(): array
    {
        return ["ID", "Petugas", "NISN","Tanggal Bayar","Bulan Dibayar","Tahun Dibayar","ID Spp", "Jumlah Bayar", "DiBuat Pada", "Diupdate Pada"];
    }
}
