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
                            <form action="{{route('pembayaran.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <strong>Siswa</strong>
                                    <select name="nisn" id="nisn" class="form-control" id="nisn" onchange="getData()">
                                       <option value="" selected disabled>Pilih Siswa</option>
                                       @foreach ($siswa as $a)
                                       <option value="{{$a->nisn}}">Nisn : {{$a->nisn}} | Nama : {{$a->nama}} | Spp - Rp. {{number_format($a->nominal) }}</option>
                                        @endforeach
                                    </select>
                                    <br><br>
                                    <div class="form-group">
                                        <label for="berapa">Bayar Berapa Bulan</label>
                                        <select name="bayar_berapa" id="berapa" class="form-control">
                                            {{-- <option selected disabled>Pilih Bulan</option> --}}
                                            <option selected value="1">1 Bulan</option>
                                            <option value="2">2 Bulan</option>
                                            <option value="3">3 Bulan</option>
                                            <option value="4">4 Bulan</option>
                                            <option value="5">5 Bulan</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="7">7 Bulan</option>
                                            <option value="8">8 Bulan</option>
                                            <option value="9">9 Bulan</option>
                                            <option value="10">10 Bulan</option>
                                            <option value="11">11 Bulan</option>
                                            <option value="12">12 Bulan</option>
                                        </select>
                                    </div>
                                    <input type="text" id="spp" class="form-control" readonly placeholder="nominal spp">
                                    <strong>Terakhir Bayar</strong>
                                    <input type="text" name="akhir" id="akhir" class="form-control mb-2" readonly>
                                    <strong>Nominal</strong>
                                    <input type="text" name="nominal" id="nominal" class="form-control mb-2" readonly>
                                    <strong>Uang</strong>
                                    <input type="number" name="jumlah_bayar" class="form-control mb-2" id="jumlah_bayar">
                                    <strong>Kembalian</strong>
                                    <input type="number" class="form-control mb-2" id="kembalian" readonly>
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                               </form>
                        </div>
                    </div>
                </div>
        </div>
        <script>
            $(document).ready(function() {
            $('#nisn').select2();
         });
        </script>
        <script>
            $('#nisn').on('change', function(){
                var nisn = $('#nisn').val();
                var berapa = $('#berapa').val();
                $('#trk').removeClass('d-none');
                $.ajax({
                    url: "{{url('/pembayaran/get-data/')}}" + "/" + nisn + "/" + berapa,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('#spp').val(data['nominal']);
                        $('#akhir').val(data['bulan']);
                    }
                });
        
                $('#berapa').on('change', function () {
                    var spp = $('#spp').val();
                    var bayar = $(this).val();
                    var total = spp * bayar;
                    $('#nominal').val(total);
        
                })
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#nominal, #jumlah_bayar").keyup(function() {
                    var harga  = $("#nominal").val();
                    var jumlah = $("#jumlah_bayar").val();
        
                    var total = parseInt(jumlah) - parseInt(harga);
                    $("#kembalian").val(total);
                });
            });
        </script>
        
        <script>
            $('#jumlah_bayar').keyup(function(){
                var sanitized = $(this).val().replace(/[^0-9]/g, '');
        
                $(this).val(sanitized);
            });
        </script>
@endsection