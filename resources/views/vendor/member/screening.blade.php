<x-app-layout>
	<div class="py-4 px-4 pb-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 pb-20">
        	<div class="text-center">
	            <img src="{{ asset('asset/landing/screening_saham.svg') }}" alt="illustrasi" class="w-1/2 mb-4 mx-auto">
				<h1 class="text-2xl font-bold text-gray-600">Screening Fundamental</h1>
        	</div>
        	@if(!isset($pages))
			<form action="{{ url('member/screening/search') }}" class="card-filter text-xs flex flex-col md:flex-row gap-4 bg-white shadow-lg rounded-lg p-4 mt-6">
				@csrf
				<div class="md:w-1/2">
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center w-full md:center">
						<div class="w-full md:w-2/5">Current Ratio</div>
						<select name="option_cr" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="cr" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Dividen Saham (Rp)</div>
						<select name="option_ds" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="ds" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Dividen Yield</div>
						<select name="option_dy" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="dy" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Dividen Payout</div>
						<select name="option_dp" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="dp" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Laba bersih / saham</div>
						<select name="option_np" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="np" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Nilai Buku</div>
						<select name="option_bv" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="bv" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Debt to Asset Ratio (%)</div>
						<select name="option_dar" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="dar" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
				</div>
				<div class="md:w-1/2">
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Debt to Equity Ratio (%)</div>
						<select name="option_der" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="der" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Return of Assets (%)</div>
						<select name="option_roa" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="roa" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Return of Equity (%)</div>
						<select name="option_roe" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="roe" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Net Profit Margin (%)</div>
						<select name="option_npm" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="npm" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Price to Earning Ratio (%)</div>
						<select name="option_per" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="per" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Price to Book Value (%)</div>
						<select name="option_pbv" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">- pilih -</option>
							<option value="down">di bawah</option>
							<option value="up">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input name="pbv" type="number" step="0.01"  class="form-input text-xs" >
						</div>
					</div>
					<div class="text-center mt-2">
						<button class="imline-block px-6 py-2 bg-green text-white uppercase font-bold rounded-full">Cari</button>
					</div>
				</div>
			</form>
			@else
				<div class="text-center">
					<a href="{{ url('member/screening') }}" class="btn">Atur Ulang Screening</a>
				</div>
				<div class="result-screening mt-6">
					<h1 class="text-2xl font-bold text-gray-600 mb-2">Hasil Pencarian</h1>
					<table class="rounded-lg w-full shadow-md overflow-auto md:overflow-hidden bg-white p-2">
						<thead  class="bg-gr text-white">
							<tr>
								<th class="p-2">#</th>
								<th>Kode Emiten</th>
								<th>Nama Emiten</th>
								<th>Sektor</th>
								<th>Syariah</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse($items as $item)
								<tr>
								@include('vendor.components.iteration' , ['paginate' => 15])
									<td style="width: 70px" class="text-center">{{ $item->code_issuers }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->sector->sector }}</td>
									<td style="width: 50px" class="text-center">{{ ($item->sharia === 'true') ? 'Ya' : 'Bukan' }}</td>
									<td class="col-badge">
										<form action="{{ url('member/report/search') }}">
											<input type="hidden" name="keyword" value="{{ $item->code_issuers }}">
											<button class="badge bg-green focus:outline-none">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
												  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
												</svg>
											</button>
										</form>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="6">Tidak ada Item</td>
								</tr>
							@endforelse
						</tbody>
					</table>
							<div class="flex sm:items-center justify-center md:justify-between mt-5">
					            <div class="hidden md:block">
					                <p class="text-sm text-gray-700 leading-5">
					                    {!! __('Menampilkan hasil') !!}
					                    <span class="font-medium">{{ $items->count() }}</span>
					                    {!! __('data dari') !!}
					                    <span class="font-medium">{{ $total_items }}</span>
					                    {!! __('data') !!}
					                </p>
					            </div>
								<span class="relative z-0 inline-flex shadow-sm rounded-md">
									@for($i = 1; $i <= $pages ; $i++)
										<form>
											<input type="hidden" name="page" value="{{ $i }}">
											<input type="hidden" name="data_query" value="{{ $query }}">
											<button class="relative inline-flex items-center px-4 py-2 text-sm font-medium  border border-gray-300 leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-green-300 focus:shadow-outline-green active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 @if($_GET['page'] == $i) bg-blue-400 text-white @else bg-white text-gray-500 @endif">{{ $i }}</button>
										</form>
									@endfor
								</span>
							</div>
				</div>
			@endif

			
		</div>
	</div>

</x-app-layout>



