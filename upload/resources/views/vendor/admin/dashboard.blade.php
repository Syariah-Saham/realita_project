@extends('layouts.admin')
@section('title'  , 'Dashboard')
@section('dashboard' , 'active')
@section('body')

<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Dashboard</h1>

<table class="w-full bg-white rounded-xl overflow-hidden">
	<thead class="bg-green-400 text-white">
		<tr>
			<th class="p-2">#</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		@forelse($members as $member)
			<tr class="text-center">
				<td class="p-2">{{ $loop->iteration }}</td>
				<td class="text-left">{{ $member->name }}</td>
				<td class="text-left">{{ $member->email }}</td>
				<td>{{ $member->status }}</td>
				<td class="col-badge">
					<form action="{{ url('admin/member/'.$member->id.'/status') }}" method="post">
						@csrf
						@method('put')
						<input type="hidden" name="status" value="confirmed">
						<button class="badge bg-green">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
							</svg>
						</button>
					</form>
					<form action="{{ url('admin/member/'.$member->id.'/status') }}" method="post">
						@csrf
						@method('put')
						<input type="hidden" name="status" value="rejected">
						<button class="badge bg-red">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</button>
					</form>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Tidak ada member</td>
			</tr>
		@endforelse
	</tbody>
</table>

@endsection
	