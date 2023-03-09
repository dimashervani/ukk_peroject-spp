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
                            <form action="{{ route('spp.update',$spp->id) }}" method="PUT" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
            
                                <div class="card-body">
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
                                        <label>tahun :</label>
                                        <input type="number"min="2000" name="tahun" value="{{ $spp->tahun }}" class="form-control" placeholder="Masukan kompetensi keahlian">
                                    </div>
                                    <div class="form-group">
                                        <label>nominal :</label>
                                        <input type="number"min="1" name="nominal" value="{{ $spp->nominal }}" class="form-control" placeholder="Masukan kompetensi keahlian">
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