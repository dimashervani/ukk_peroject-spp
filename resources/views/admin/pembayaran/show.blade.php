@extends('layouts.style')

@section('content')
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-end">
                                    
                                </div>
                                <!-- Modal -->
                                <h4 class="card-title">Detail Pembayaran</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>ID</td>
                                                <td>{{ $pembayaran->id }}</td>
                                            </tr>
                                            <tr>
                                                @foreach($users as $user)
                                                @if($user->id == $pembayaran->id_petugas)
                                                <td>Petugas</td>
                                                <td>{{ $user->name }}</td>
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach($siswas as $siswa)
                                                @if($siswa->nisn == $pembayaran->nisn)
                                                <td>Nama Siswa</td>
                                                <td>{{ $siswa->nama }}</td>
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>NISN</td>
                                                <td>{{ $pembayaran->nisn }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Bayar</td>
                                                <td>{{ $pembayaran->tgl_bayar }}</td>
                                            </tr>
                                            <tr>
                                                <td>Yang Di Bayar</td>
                                                <td>{{ $pembayaran->bulan_dibayar }} {{ $pembayaran->tahun_dibayar }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Uang</td>
                                                <td>{{ number_format($pembayaran->jumlah_bayar) }}</td>
                                            </tr>
                                            <tr>
                                                @foreach($spps as $sp)
                                                @if($sp->id == $pembayaran->id_spp)
                                                <td>Nominal Perbulan</td>
                                                <td>{{ number_format($sp->nominal) }}</td>
                                                @endif
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>Di isi pada</td>
                                                <td>{{ $pembayaran->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Di Isi Pada</td>
                                                <td>{{ $pembayaran->updated_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</body>

</html>
@endsection