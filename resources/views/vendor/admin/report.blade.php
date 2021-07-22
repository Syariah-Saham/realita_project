@extends('layouts.admin')
@section('title'  , 'Laporan Keuangan')
@section('body')

@include('vendor.components.modal-delete')


<div class="container pb-20">
	<h1 class="text-2xl font-bold text-gray-600">Laporan Keuangan</h1>


	<div class="flex flex-col md:flex-row items-center gap-2">
		<form id="form" action="{{ url('admin/report/search') }}">
			<div id="listStocks" data-json="{{ $codes }}"></div>
			<div class="w-54">
				<div class="inline-block">
					<input autocomplete="off" autofocus="true" type="text" id="inputKeyword" name="keyword" class="form-input rounded-full px-8" placeholder="Ketik kode emiten...">
				</div>
				<button style="background-image: linear-gradient(136deg, #2af598 0%, #009efd 100%);" class="text-white py-2 px-4 rounded relative transform translate-y-2">
					<svg class="h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
					</svg>
				</button>
			</div>
			<ul id="listKeyword" class="absolute z-10 bg-white transform translate-y-3 rounded shadow-md">
            </ul>
		</form>

		<script>
            const form = document.getElementById('form');
            const input       = document.getElementById('inputKeyword');
            const listKeyword = document.getElementById('listKeyword');
            let codes         = document.getElementById('listStocks').getAttribute('data-json');
            codes             = JSON.parse(codes);

            input.addEventListener('keyup' , () => {
                input.value = input.value.toUpperCase();

                let resultCode = codes.filter(code => code.includes(input.value));
                if(resultCode.length > 5) { resultCode.length = 5; }
                listKeyword.innerHTML = '';
                resultCode.forEach(code => {
                    let li = document.createElement('li');
                    li.className = 'px-6 py-3  w-72 cursor-pointer hover:bg-green-100';
                    li.innerText = code;
                    listKeyword.append(li);

                    li.addEventListener('click' , () => {
                        input.value = li.innerText;
                        listKeyword.innerHTML = '';
                        form.submit();
                    })
                })
            });
        </script>
		
		
		<div>
			<a href="{{ url('/admin/report/create') }}" class="btn">Tambah Laporan Keuangan</a>
		</div>
	</div>
	
	<table class="rounded shadow-lg w-full mt-4 overflow-hidden">
		<thead class="bg-green-400 text-white">
			<tr>
				<th class="p-2">#</th>
				<th>Kode Emiten</th>
				<th>Nama Emiten</th>
				<th>Periode</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse($reports as $report)
				<tr>
					@include('vendor.components.iteration' , ['paginate' => 50])
					<td>{{ $report->stock->code_issuers }}</td>
					<td>{{ $report->stock->name }}</td>
					<td class="text-center">{{ $report->periode->year }}</td>
					<td class="col-badge">
						<a href="{{ url('admin/report/search/?keyword='.$report->stock->code_issuers) }}" class="badge bg-green">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
							</svg>
						</a>
						<button data-action="{{ url('admin/report/' . $report->id) }}" class="badge badge-delete bg-red">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
							</svg>
						</button>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="5" class="text-center font-bold text-lg">Tidak ada data</td>
				</tr>
			@endforelse
		</tbody>
	</table>




	<div class="my-6">
			{{ $reports->links() }}
	</div>
	
</div>

@endsection
	