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
                                    {{-- <a href="{{route('kelas.create')}}" class="btn btn-success d-none  d-lg-block m-l-15">Create</a> --}}
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                        Tambah
                                      </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Kelas baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>NISN :</label>
                                                        <input type="text" required name="nisn" class="form-control" placeholder="Masukan nisn">
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label>Kategori :</label>
                                                        <select class="form-control" name="category_id" aria-label="Default select example">
                                                            <option selected disabled>Pilih Kategori</option>
                                                            @foreach($category as $c)
                                                                <option value="{{ $c->id }}">
                                                                    {{ $c->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label>NIS :</label>
                                                        <input type="text" required name="nis" class="form-control" placeholder="Masukan nis">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama :</label>
                                                        <input type="text" required name="nama" class="form-control" placeholder="Masukan nama">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ID Kelas :</label>
                                                        <select required class="form-control" name="id_kelas" aria-label="Default select example">
                                                            <option selected disabled>Pilih ID Kelas</option>
                                                            @foreach($kelas as $c)
                                                                <option value="{{ $c->id_kelas }}">
                                                                    {{ $c->nama_kelas }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat :</label>
                                                        <input type="text" required name="alamat" class="form-control" placeholder="Masukan Alamat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No telp :</label>
                                                        <input type="number" required name="no_telp" class="form-control" placeholder="Masukan no telp">
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label>ID SPP :</label>
                                                        <input type="number" name="id_spp" class="form-control" placeholder="Masukan nis">
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label>ID SPP :</label>
                                                        <select required class="form-control" name="id_spp" aria-label="Default select example">
                                                            <option selected disabled>Pilih ID SPP</option>
                                                            @foreach($spp as $c)
                                                                <option value="{{ $c->id }}">
                                                                    {{ $c->tahun }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Tabel Siswa</h4>
                                <div class="table-responsive">
                                    <table id="table" class="table table-bordered yajra-datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>ID Kelas</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>ID Spp</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $n=1;
                                            @endphp
                                            @foreach ($siswa as $b)
                                                <tr>
                                                    <td>{{ $n++}}</td>
                                                    <td>{{ $b->nisn }}</td>
                                                    <td>{{ $b->nis}}</td>
                                                    <td>{{ $b->nama }}</td>
                                                    <td>{{ $b->id_kelas }}</td>
                                                    <td>{{ $b->alamat }}</td>
                                                    <td>{{ $b->no_telp }}</td>
                                                    <td>{{ $b->id_spp }}</td>
                    
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default">Action</button>
                                                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu" style="">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('siswa.edit', $b->id) }}">Edit</a>
                    
                                                                <form action="{{ route('siswa.destroy', $b->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Yakin Hapus data ini??')" type="submit" class="dropdown-item">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $siswa->appends(\Request::except('page'))->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <Script>
        $(document).ready(function(){
            $('#table').dataTable();
        })
    </Script>
@endsection