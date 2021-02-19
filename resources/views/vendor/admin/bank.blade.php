@extends('layouts.admin')
@section('title'  , 'Daftar Bank')
@section('body')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8 flex flex-col md:flex-row gap-4">
	<div class="w-full md:w-1/2">
		@forelse($banks as $bank)
			<div class="bg-white rounded-md shadow-md px-6 py-3 mb-3 flex flex-row justify-between">
				<div>
					<h2 class="text-sm md:text-lg font-light">{{ $bank->name }}</h2>
					<h1 class="font-semibold text-lg md:text-3xl text-orange-500">{{ $bank->card_number }}</h1>
					<p class="text-sm md:text-lg font-bold">{{ $bank->bank }}</p>
				</div>
				<div>
					<button class="bg-gr p-1 text-white">
						<svg class="h-4 w-4 md:h-6 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
						</svg>
					</button>
					<form action="{{ url('admin/bank/'.$bank->id) }}" method="post">
						@csrf
						@method('delete')
						<button class="bg-gr2 p-1 text-white">
							<svg class="h-4 w-4 md:h-6 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
							</svg>
						</button>
					</form>
				</div>
			</div>
		@empty
			<h1>Tidak ada bank</h1>
		@endforelse
			
	</div>
	<div class="w-full md:w-1/2">
		<form action="{{ url('admin/bank') }}" method="post" class="bg-white rounded-lg shadow-lg p-4">
			@csrf
			<h1 class="text-2xl font-bold">Tambah Bank</h1>
			<div class="form-group">
				<label for="name" class="form-label">Nama</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-input @error('name') is-invalid @enderror">
				@include('vendor.components.error' , ['name' => 'name'])
			</div>
			<div class="form-group">
				<label for="card_number" class="form-label">Nomor Rekening</label>
				<input type="number" name="card_number" value="{{ old('card_number') }}" class="form-input @error('card_number') is-invalid @enderror">
				@include('vendor.components.error' , ['name' => 'card_number'])
			</div>
			<div class="form-group">
				<label for="bank" class="form-label">Nama Bank</label>
				<input type="text" name="bank" value="{{ old('bank') }}" class="form-input @error('bank') is-invalid @enderror">
				@include('vendor.components.error' , ['name' => 'bank'])
			</div>
			<button class="btn">Tambah</button>
		</form>
	</div>
</div>

@endsection
	