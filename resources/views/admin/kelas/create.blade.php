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
                            <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
            
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kelas :</label>
                                        <input type="text" name="nama_kelas" class="form-control" placeholder="Masukan nama kelas">
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
                                        <label>Kompetensi Keahlian :</label>
                                        <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Masukan kompetensi keahlian">
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