@extends('layouts.admin')
@section('title'  , 'Daftar Member')
@section('body')

@include('vendor.components.modal-delete')

<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Member</h1>
<table class="w-full bg-white rounded-xl overflow-hidden shadow-lg">
	<thead class="bg-green-400 text-white">
		<tr>
			<th class="p-2">#</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Paket</th>
			<th>Awal</th>
			<th>Berakhir</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		
		@forelse($members as $member)
			<tr class="text-center">
				@include('vendor.components.iteration' , ['paginate' => 10])
				<td class="text-left">{{ $member->name }}</td>
				<td class="text-left">{{ $member->email }}</td>
				<td class="text-left">{{ $member->member->package->name }}</td>
				<td class="text-left">{{ $member->member->start_date }}</td>
				<td class="text-left">{{ $member->member->finish_date }}</td>
				<td class="col-badge">
					<button data-action="{{ url('admin/member/'.$member->id) }}" class="badge badge-delete bg-red">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
						</svg>
					</button>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Tidak ada member</td>
			</tr>
		@endforelse
	</tbody>
</table>


<div class="mt-2">
	{{ $members->links() }}
</div>

@endsection
	