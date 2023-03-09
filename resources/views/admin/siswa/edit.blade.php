@extends('layouts.style')

@section('content')
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    
                </div>
            </div>
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- ini isi nya --}}
                            <form action="{{ route('siswa.update',$siswa->id) }}" method="PUT" enctype="multipart/form-data">
                                @csrf
            
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>NISN :</label>
                                        <input type="text" value="{{ $siswa->nisn }}" required name="nisn" class="form-control" placeholder="Masukan nisn">
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
                                        <input type="text" required name="nis" value="{{ $siswa->nis }}" class="form-control" placeholder="Masukan nis">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama :</label>
                                        <input type="text" required name="nama" value="{{ $siswa->nama }}" class="form-control" placeholder="Masukan nama">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Kelas :</label>
                                        <select required class="form-control" name="id_kelas" aria-label="Default select example">
                                            @foreach($kelas as $c)
                                            <option value="{{ $siswa->id_kelas }}" selected disabled>{{ $c->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat :</label>
                                        <input type="text" value="{{ $siswa->alamat }}" required name="alamat" class="form-control" placeholder="Masukan nis">
                                    </div>
                                    <div class="form-group">
                                        <label>No telp :</label>
                                        <input type="number" value="{{ $siswa->no_telp }}" required name="no_telp" class="form-control" placeholder="Masukan nis">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>ID SPP :</label>
                                        <input type="number" name="id_spp" class="form-control" placeholder="Masukan nis">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>ID SPP :</label>
                                        <select required class="form-control" name="id_spp" aria-label="Default select example">
                                            @foreach($spp as $c)
                                            <option value="{{ $c->id }}" selected disabled>{{ $c->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
@endsection