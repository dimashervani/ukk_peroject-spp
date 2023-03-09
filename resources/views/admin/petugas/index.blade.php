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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Create">
                                        Tambah
                                      </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="Create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Buat Kelas baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Nama :</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Masukan nama kelas">
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
                                                        <label>Email :</label>
                                                        <input type="email" name="email" autocomplete="off" class="form-control" placeholder="Masukan kompetensi keahlian">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>password :</label>
                                                        <input type="password" name="password" autocomplete="off" class="form-control" placeholder="Masukan kompetensi keahlian">
                                                    </div>
                                                </div>
                                                {{-- <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Tabel Petugas</h4>
                                <div class="table-responsive">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                {{-- <th>Kompetensi keahlian</th> --}}
                                                {{-- <th>Aksi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $n=1;
                                            @endphp
                                            @foreach ($petugas as $b)
                                                <tr>
                                                    <td>{{ $n++}}</td>
                                                    <td>{{ $b->name }}</td>
                                                    <td>{{ $b->email}}</td>
                                                    {{-- <td>{{ $b->kompetensi_keahlian }}</td> --}}
                    
                                                    {{-- <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default">Action</button>
                                                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu" role="menu" style="">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('petugas.edit', $b->id) }}">Edit</a>
                    
                                                                <form action="{{ route('petugas.destroy', $b->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button onclick="return confirm('Yakin Hapus data ini??')" type="submit" class="dropdown-item">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td> --}}
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