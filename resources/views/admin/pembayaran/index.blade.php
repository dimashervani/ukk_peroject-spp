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
                                    <a class="btn btn-warning float-end" href="{{ route('pembayaran.export') }}">Export Data Pembayaran</a>
                                    <a href="{{route('pembayaran.create')}}" class="btn btn-success d-none  d-lg-block m-l-15">Create</a>
                                </div>
                                <!-- Modal -->
                                <h4 class="card-title">Tabel Pembayaran</h4>
                                <div class="table-responsive">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Petugas</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Bulan Diayar</th>
                                                <th>Tahun Bayar</th>
                                                <th>ID SPP</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $n=1;
                                            @endphp
                                            @foreach ($pembayaran as $b)
                                                <tr>
                                                    <td>{{ $n++}}</td>
                                                    <td>@foreach($users as $user)
                                                        @if($user->id == $b->id_petugas)
                                                        {{ $user->name}}
                                                        @endif 
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $b->nisn }}</td>
                                                    <td>@foreach($siswas as $siswa)
                                                        @if($siswa->nisn == $b->nisn)
                                                        {{ $siswa->nama }}
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $b->tgl_bayar }}</td>
                                                    <td>{{ $b->bulan_dibayar }}</td>
                                                    <td>{{ $b->tahun_dibayar }}</td>
                                                    <td>@foreach($spps as $spp)
                                                        @if($spp->id == $b->id_spp)
                                                        {{ $spp->tahun }}
                                                        @endif
                                                        @endforeach
                                                    </td>
                                                    <td>RP. {{ number_format($b->jumlah_bayar) }}</td>
                    
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default">Action</button>
                                                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu" style="">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('pembayaran.show', $b->id) }}">Detail</a>
                                                                {{-- <a class="dropdown-item"
                                                                    href="{{ route('books.edit', $b->id) }}">Edit</a>
                    
                                                                <form action="{{ route('books.destroy', $b->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Yakin Hapus data ini??')" type="submit" class="dropdown-item">Delete</button> --}}
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
<Script>
    $(document).ready(function(){
        $('#table').dataTable();
    })
</Script>
@endsection