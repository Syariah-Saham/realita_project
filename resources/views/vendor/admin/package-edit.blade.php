@extends('layouts.admin')
@section('title'  , 'Edit Paket')
@section('body')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8">
	<form action="{{ url('admin/package/'.$package->id) }}" method="post" class="bg-white rounded-lg shadow-lg mx-4 p-4 lg:w-2/3">
		@csrf
		@method('put')
		<h1 class="font-bold text-2xl">Edit Paket</h1>
		<div class="flex flex-col md:flex-row gap-2">
			<div class="w-2/3">
				<div class="form-group">
					<label for="name" class="form-label">Nama Paket</label>
					<input autofocus="on" type="text" name="name" value="{{ $package->name }}" class="form-input @error('name') is-invalid @enderror ">
					@include('vendor.components.error' , ['name' => 'name'])
				</div>
				<div class="form-group">
					<label for="name" class="form-label">Deskripsi</label>
					<textarea name="description" rows="3" class="form-input @error('description') is-invalid @enderror  w-full">{{ $package->description }}</textarea>
					@include('vendor.components.error' , ['name' => 'description'])
				</div>
			</div>
			<div class="w-1/3">
				<div class="form-group">
					<label for="name" class="form-label">Harga Asli Paket</label>
					<input data-type="number" type="text" name="original_price" value="{{ $package->original_price }}" class="form-input @error('original_price') is-invalid @enderror ">
					@include('vendor.components.error' , ['name' => 'original_price'])
				</div>
				<div class="form-group">
					<label for="name" class="form-label">Harga Paket Sekarang</label>
					<input data-type="number" type="text" name="current_price" value="{{ $package->current_price }}" class="form-input @error('current_price') is-invalid @enderror ">
					@include('vendor.components.error' , ['name' => 'current_price'])
				</div>
			</div>
		</div>
		<div class="flex flex-col md:flex-row gap-2">
			<div class="form-group w-1/3">
				<label for="" class="text-sm">Laporan Keuangan</label>
				<input type="number" name="report" value="{{ $package->report }}" class="form-input @error('report') is-invalid @enderror ">
				@include('vendor.components.error' , ['name' => 'report'])
			</div>
			<div class="form-group w-1/3">
				<label for="" class="text-sm">Screening Fundamental</label>
				<input type="number" name="screening" value="{{ $package->screening }}" class="form-input @error('screening') is-invalid @enderror ">
				@include('vendor.components.error' , ['name' => 'screening'])
			</div>
			<div class="form-group w-1/3">
				<label for="" class="text-sm">Comparasi Emiten</label>
				<input type="number" name="compare" value="{{ $package->compare }}" class="form-input @error('compare') is-invalid @enderror ">
				@include('vendor.components.error' , ['name' => 'compare'])
			</div>
			<div class="form-group w-full md:w-1/4">
				<label for="" class="text-xs">Watchlist Emiten</label>
				<input type="number" name="watchlist" value="{{ $package->watchlist }}" class="form-input @error('watchlist') is-invalid @enderror ">
				@include('vendor.components.error' , ['name' => 'watchlist'])
			</div>
		</div>
		<div class="flex flex-row justify-between">
			<a href="{{ url('admin/package') }}" class="btn">Daftar Paket</a>
			<button class="btn">Edit Paket</button>
		</div>
	</form>
</div>

@endsection

@section('script')
	<script>
		const inputsNumber = document.querySelectorAll('input[data-type="number"]');

		inputsNumber.forEach(input => {
			input.addEventListener('keyup' , () => {
				console.log(formatRupiah(input.value));
				input.value = formatRupiah(input.value);
			})
		})

		function formatRupiah(angka, prefix)
		   {
		       var number_string = angka.replace(/[^,\d]/g, '').toString(),
		           split    = number_string.split(','),
		           sisa     = split[0].length % 3,
		           rupiah     = split[0].substr(0, sisa),
		           ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
		           
		       if (ribuan) {
		           separator = sisa ? '.' : '';
		           rupiah += separator + ribuan.join('.');
		       }
		       
		       rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		       return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		   }
	</script>
@endsection
	