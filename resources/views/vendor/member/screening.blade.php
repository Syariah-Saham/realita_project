<x-app-layout>
	<div class="py-4 px-4 pb-12">
        <div class="max-w-7xl md:px-4 sm:px-6 lg:px-8 pb-20">
        	<div class="text-center">
	            <img src="{{ asset('asset/landing/screening_saham.svg') }}" alt="illustrasi" class="w-4/5 md:w-1/2 mb-4 mx-auto">
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
						<div class="w-full md:w-2/5">Debt to Asset Ratio</div>
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
						<div class="w-full md:w-2/5">Debt to Equity Ratio</div>
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
						<div class="w-full md:w-2/5">Return of Assets</div>
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
						<div class="w-full md:w-2/5">Return of Equity</div>
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
						<div class="w-full md:w-2/5">Net Profit Margin</div>
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
						<div class="w-full md:w-2/5">Price to Earning Ratio</div>
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
						<div class="w-full md:w-2/5">Price to Book Value</div>
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
					<table class="rounded-lg w-full shadow-md text-xs sm:text-sm md:text-md overflow-auto md:overflow-hidden bg-white p-2">
						<thead  class="bg-gr text-white">
							<tr>
								<th class="p-2 w-4">#</th>
								<th class="w-8">Kode Emiten</th>
								<th>Nama Emiten</th>
								@if($ratios->contains('cr')) <th>CR</th> @endif
								@if($ratios->contains('ds')) <th>DS</th> @endif
								@if($ratios->contains('dy')) <th>DY</th> @endif
								@if($ratios->contains('dp')) <th>DP</th> @endif
								@if($ratios->contains('np')) <th>NP</th> @endif
								@if($ratios->contains('bv')) <th>BV</th> @endif
								@if($ratios->contains('dar')) <th>DAR</th> @endif
								@if($ratios->contains('der')) <th>DER</th> @endif
								@if($ratios->contains('roa')) <th>ROA</th> @endif
								@if($ratios->contains('roe')) <th>ROE</th> @endif
								@if($ratios->contains('npm')) <th>NPM</th> @endif
								@if($ratios->contains('per')) <th>PER</th> @endif
								@if($ratios->contains('pbv')) <th>PBV</th> @endif
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse($items as $item)
								@php
									$report = $item->report->last()->ratio;
								@endphp
								<tr @if($loop->iteration % 2 === 0) class="bg-gray-100" @endif>
									@include('vendor.components.iteration' , ['paginate' => 15])
									<td class="text-center w-8 md:w-24">{{ $item->code_issuers }}</td>
									<td>{{ $item->name }}</td>
									@if($ratios->contains('cr')) <td class="text-center">{{ $report->current_ratio }}</td> @endif
									@if($ratios->contains('ds')) <td class="text-center">{{ $report->dividend_nominal }}</td> @endif
									@if($ratios->contains('dy')) <td class="text-center">{{ $report->dividend_yield }}</td> @endif
									@if($ratios->contains('dp')) <td class="text-center">{{ $report->dividend_payout }}</td> @endif
									@if($ratios->contains('np')) <td class="text-center">{{ $report->net_profit }}</td> @endif
									@if($ratios->contains('bv')) <td class="text-center">{{ $report->book_value }}</td> @endif
									@if($ratios->contains('dar')) <td class="text-center">{{ $report->debt_asset_ratio }}</td> @endif
									@if($ratios->contains('der')) <td class="text-center">{{ $report->debt_equity_ratio }}</td> @endif
									@if($ratios->contains('roa')) <td class="text-center">{{ $report->return_of_assets }}</td> @endif
									@if($ratios->contains('roe')) <td class="text-center">{{ $report->return_of_equity }}</td> @endif
									@if($ratios->contains('npm')) <td class="text-center">{{ $report->net_profit_margin }}</td> @endif
									@if($ratios->contains('per')) <td class="text-center">{{ $report->price_to_earning_ratio }}</td> @endif
									@if($ratios->contains('pbv')) <td class="text-center">{{ $report->price_to_book_value }}</td> @endif
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
									<td colspan="6" class="p-3 text-center font-bold text-lg">Tidak ada Item</td>
								</tr>
							@endforelse
						</tbody>
					</table>
							<p class="mt-6 text-xs md:text-sm">
								*) Catatan:
								@if($ratios->contains('cr'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">CR</div>
										<div>Current Ratio</div>
									</div>
								@endif
								@if($ratios->contains('ds'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">DS</div>
										<div>Dividen Saham (Rp)</div>
									</div>
								@endif
								@if($ratios->contains('dy'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">DY</div>
										<div>Dividen Yield</div>
									</div>
								@endif
								@if($ratios->contains('dp'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">DP</div>
										<div>Dividen Payout</div>
									</div>
								@endif
								@if($ratios->contains('np'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">NP</div>
										<div>Laba bersih / saham</div>
									</div>
								@endif
								@if($ratios->contains('bv'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">BV</div>
										<div>Nilai Buku</div>
									</div>
								@endif
								@if($ratios->contains('dar'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">DAR</div>
										<div>Debt to Asset Ratio (%)</div>
									</div>
								@endif

								@if($ratios->contains('der'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">DER</div>
										<div>Debt to Equity Ratio (%)</div>
									</div>
								@endif
								@if($ratios->contains('roa'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">ROA</div>
										<div>Return of Assets (%)</div>
									</div>
								@endif
								@if($ratios->contains('roe'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">ROE</div>
										<div>Return of Equity (%)</div>
									</div>
								@endif
								@if($ratios->contains('npm'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">NPM</div>
										<div>Net Profit Margin (%)</div>
									</div>
								@endif
								@if($ratios->contains('per'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">PER</div>
										<div>Price to Earning Ratio (%)</div>
									</div>
								@endif
								@if($ratios->contains('pbv'))
									<div class="flex text-xs md:text-sm">
										<div class="w-15">PBV</div>
										<div>Price to Book Value (%)</div>
									</div>
								@endif
							</p>
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



