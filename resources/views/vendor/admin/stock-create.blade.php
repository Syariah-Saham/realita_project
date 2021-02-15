@extends('layouts.admin')
@section('title'  , 'Tambah Saham')
@section('body')



<div class="flex flex-row gap-4 pb-16">
	<form action="{{ url('admin/stock/create') }}" method="post" class="p-3 w-2/3 shadow-lg rounded bg-white">
		@csrf
		<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Tambah Saham</h1>
		<div class="form-group">
			<label for="" class="form-label">Nama Emiten</label>
			<input autofocus="true" type="text" class="form-input @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}">
			@include('vendor.components.error' , ['name' => 'name'])
		</div>
		<div class="flex flex-row gap-2">
			<div class="form-group w-1/2">
				<label for="kode_emiten">Kode Emiten </label>
				<input type="text" id="kode_emiten" name="code_issuers" class="form-input @error('code_issuers') is-invalid @enderror  " value="{{ old('code_issuers') }}">
				@include('vendor.components.error' , ['name' => 'code_issuers'])
			</div>
			<div class="form-group w-1/2">
				<label for="ipo_date">Tangga IPO </label>
				<input type="date" id="ipo_date" name="ipo_date" class="form-input @error('ipo_date') is-invalid @enderror  " value="{{ old('ipo_date') }}">
				@include('vendor.components.error' , ['name' => 'ipo_date'])
			</div>
		</div>
		<div class="flex flex-row gap-2">
			<div class="form-group w-1/2">
				<label for="sector">Sektor </label>
				<select name="sector_id" id="sector_id" class="form-input @error('sector_id') is-invalid @enderror  w-full">
					<option value="">-- Pilih Sektor</option>
					@foreach($sectors as $sector)
						<option value="{{ $sector->id }}">{{ $sector->sector }}</option>
					@endforeach
				</select>
				@include('vendor.components.error' , ['name' => 'sector_id'])
			</div>
			<div class="form-group w-1/2">
				<label for="industry">Industri </label>
				<select name="industry_id" id="industry_id" class="form-input @error('industry_id') is-invalid @enderror  w-full">
					<option value="">-- Pilih Industri --</option>
					@foreach($industries as $industry)
						<option value="{{ $industry->id }}">{{ $industry->industry }}</option>
					@endforeach
				</select>
				@include('vendor.components.error' , ['name' => 'industry_id'])
			</div>
		</div>
		<div class="flex flex-row gap-2">
			<div class="form-group w-1/2">
				<label for="total_stock">Total Saham </label>
				<input type="number" id="total_stock" name="total_stock" class="form-input @error('total_stock') is-invalid @enderror  " value="{{ old('total_stock') }}">
				@include('vendor.components.error' , ['name' => 'total_stock'])
			</div>
			<div class="form-group w-1/2">
				<label for="capitalization">Kapitalisasi </label>
				<input type="number" id="capitalization" name="capitalization" class="form-input @error('capitalization') is-invalid @enderror  " value="{{ old('capotalozation') }}">
				@include('vendor.components.error' , ['name' => 'capitalization'])
			</div>
		</div>
		<div class="flex flex-row gap-2">
			<div class="form-group w-1/2">
				<label for="kurs_report">kurs</label>
				<input type="text" id="kurs_report" name="kurs_report" class="form-input @error('kurs_report') is-invalid @enderror  " value="{{ old('kurs_report') }}">
				@include('vendor.components.error' , ['name' => 'kurs_report'])
			</div>
			<div class="form-group w-1/2">
				<label for="sharia">Syariah</label>
				<div class="flex flex-row items-center">
					<input type="radio" name="sharia" value="true">
					<span>Iya</span>
					<input type="radio" name="sharia" value="false">
					Bukan
				</div>
			</div>
		</div>
		<button class="btn">Tambah</button>
	</form>
	<div class="w-1/3">
		<table class="shadow-lg rounded overflow-hidden w-full">
			<thead class="bg-gr text-white">
				<tr>
					<th class="p-2">Sektor</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@forelse($sectors as $sector)
					<tr>
						<td class="p-2">{{ $sector->sector }}</td>
						<td class="col-badge">
							<a href="{{ url('member/report') }}" class="badge bg-green">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
								</svg>
							</a>
							<form action="{{ url('admin/sector/' . $sector->id) }}" method="post">
								@csrf
								@method('delete')
								<button class="badge bg-red">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
									</svg>
								</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td class="p-2 text-center font-bold" colspan="2">Tidak ada data</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		<a href="{{ url('admin/sector/create') }}" class="btn">Tambah Sektor</a>


		<table class="shadow-lg rounded overflow-hidden w-full mt-4">
			<thead class="bg-gr text-white">
				<tr>
					<th class="p-2">Industri</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@forelse($industries as $industry)
					<tr>
						<td class="p-2">{{ $industry->industry }}</td>
						<td class="col-badge">
							<a href="{{ url('member/report') }}" class="badge bg-green">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
								</svg>
							</a>
							<form action="{{ url('admin/industry/' . $industry->id) }}" method="post">
								@csrf
								@method('delete')
								<button class="badge bg-red">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
									</svg>
								</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td class="p-2 text-center font-bold text-lg" colspan="2">Tidak ada data</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		<a href="{{ url('admin/industry/create') }}" class="btn">Tambah Industri</a>
	</div>
</div>

@endsection
	