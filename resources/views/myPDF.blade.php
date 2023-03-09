<link href="/css/style.css" rel="stylesheet">
@php $i = 0;@endphp
<div class="card">
	<div class="card-body">
	  <div class="container mb-5 mt-3">
		<div class="row d-flex align-items-baseline">
		  <div class="col-xl-9">
			<p style="color: #7e8d9f;font-size: 20px;">Struk &gt;&gt; <strong>ID: {{ $data->id }}</strong></p>
		  </div>
		</div>
		<div class="container">
		  <div class="col-md-12">
			<div class="text-center">
			  <i class="fa-4x ms-0" style="color:#8f8061 ;">$</i>
			  <p class="pt-2">Pembayaran Spp</p>
			</div>
		  </div>
		  <div class="row">
			<div class="col-xl-8">
			  <ul class="list-unstyled">
				<li class="text-muted">Nama : <span style="color:#8f8061 ;">{{ $siswa->nama }}</span></li>
				<li class="text-muted">Alamat : {{ $siswa->alamat }}</li>
				<li class="text-muted">No Telepon : {{$siswa->no_telp}}<i class="fas fa-phone"></i></li>
			  </ul>
			</div>
			<div class="col-xl-4">
			  <p class="text-muted">struk</p>
			  <ul class="list-unstyled">
				<li class="text-muted"><i class="fas fa-circle" style="color:#8f8061 ;"></i> <span
					class="fw-bold">Tanggal : </span>{{ date('d-m-Y',($data->from_date)) }}</li>
			  </ul>
			</div>
		  </div>
		  <div class="row my-2 mx-1 justify-content-center">
			<div class="col-md-7 mb-4 mb-md-0">
			  <p class="fw-bold">Bulan yang di bayar</p>
			  <p class="mb-1">
				  @foreach($invoice as $in)
				<span class="text-muted">{{ $in->bulan_dibayar }}</span>
			</p>
			<p class="mb-1">
				<span>{{ $spp->id_spp }}</span>
			</p>
			@endforeach
		</div>
		<div class="col-md-3 mb-4 mb-md-0">
			<h5 class="mb-2">
				<span class="align-middle">:</span>
				@foreach($invoice as $in)
				  @php
				  $i++
				  @endphp
				<p>{{ $spp->nominal}}</p>

				@endforeach
			</h5>
		</div>
	</div>
	<hr>
	<p>Jumlah Uang : {{ $data->jumlah_bayar }}</p>
		  <hr>
		  <div class="row">
			<div class="col-xl-3">
			  <p class="text-black float-start"><span class="text-black me-3">Total: </span><span
				  style="font-size: 25px;">RP. {{ $spp->nominal * $i }}</span></p>
			</div>
			<div class="col-xl-3">
				<p class="text-black float-start"><span class="text-black me-3">kembalian : </span><span
					style="font-size: 25px;">RP. {{ $data->jumlah_bayar - $spp->nominal * $i }}</span></p>
			  </div>
		  </div>
		</div>
	  </div>
	</div>
  </div>