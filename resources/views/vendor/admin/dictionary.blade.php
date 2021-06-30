@extends('layouts.admin')
@section('title'  , 'Kamus Fundamental')
@section('body')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8">
	<div class="flex flex-col md:flex-row gap-4">
		<form method="post" action="{{ url('admin/dictionary') }}" class="rounded-lg shadow-lg p-4 bg-white w-full md:w-1/2">
			@csrf
			<h1 class="text-lg font-semibold">Tambah Kamus</h1>
			<div class="form-group">
				<label for="keyword" class="form-label">Keyword</label>
				<input type="text" class="form-input @error('keyword') is-invalid @enderror" value="{{ old('keyword') }}" name="keyword">
				@include('vendor.components.error' , ['name' => 'keyword'])
			</div>
			<div class="form-group">
				<label for="description" class="form-label">Deskripsi</label>
				<textarea name="description" rows="2" class="form-input w-full @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
				@include('vendor.components.error' , ['name' => 'description'])
			</div>
			<button class="btn">Tambah</button>
		</form>
		<form method="post" id="formEdit" action="{{ url('admin/dictionary/update') }}" class="rounded-lg shadow-lg p-4 bg-white w-full md:w-1/2">
			@csrf
			@method('put')
			<h1 class="text-lg font-semibold">Edit Kamus</h1>
			<input type="hidden" name="id">
			<div class="form-group">
				<label for="keyword" class="form-label">Keyword</label>
				<input type="text" class="form-input @error('editKeyword') is-invalid @enderror" name="editKeyword">
				@include('vendor.components.error' , ['name' => 'editKeyword'])
			</div>
			<div class="form-group">
				<label for="description" class="form-label">Deskripsi</label>
				<textarea name="editDescription" rows="2" class="form-input w-full @error('editDescription') is-invalid @enderror"></textarea>
				@include('vendor.components.error' , ['name' => 'editDescription'])
			</div>
			<button class="btn">Edit</button>
		</form>
	</div>


	<div class="items mt-5 flex flex-col md:flex-row w-full gap-2">
		@php
			$total_item = $items->count();
			$chunk_row = ceil($total_item / 3);
		@endphp
		@forelse($items->chunk($chunk_row) as $chunk)
			<div class="flex flex-col gap-2 w-full">
				@foreach($chunk as $item)
					<div class="bg-white w-full rounded-sm shadow-md p-3">
						<h3 class="font-semibold text-sm md:text-lg">
							<span>{{ $item->keyword }}</span>
							<button data-id="{{ $item->id }}" class="p-1 text-teal-400 transition duration-200 hover:text-teal-600 transform translate-y-1 btnEdit">
								<svg class="h-4 w-4 md:h-6 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
								</svg>
							</button>
							<form action="{{ url('admin/dictionary/' . $item->id) }}" method="post" class="inline-block">
								@csrf
								@method('delete')
								<button class="text-red-400 h-6 w-6 transform translate-y-1 focus:outline-none hover:text-red-600 transition duration-200">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
									</svg>
								</button>
							</form>
						</h3>
						<p class="text-xs md:text-sm">{{ $item->description }}</p>
					</div>
				@endforeach
			</div>
		@empty
			<h1>Tidak ada data</h1>
		@endforelse
	</div>
</div>

@endsection

@section('script')

<script>
	const btnEdit = document.querySelectorAll('.btnEdit');
	const formEdit = document.getElementById('formEdit');
	btnEdit.forEach(btn => {
		btn.addEventListener('click' , () => {
			let id = btn.getAttribute('data-id');
			let title = btn.parentElement.firstElementChild.innerHTML;
			let description = btn.parentElement.parentElement.lastElementChild.innerHTML;

			formEdit.id.value = id;
			formEdit.editKeyword.value = title;
			formEdit.editDescription.value = description;
		})
	})
</script>

@endsection
	