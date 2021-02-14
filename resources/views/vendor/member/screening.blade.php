<x-app-layout>
	<div class="py-4 px-4 pb-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 pb-10">
        	<div class="text-center">
	            <img src="{{ asset('asset/landing/screening_saham.svg') }}" alt="illustrasi" class="w-1/2 mb-4 mx-auto">
				<h1 class="text-2xl font-bold text-gray-600">Screening Fundamental</h1>
        	</div>
			<div class="card-filter text-xs flex flex-col md:flex-row gap-4 bg-white shadow-lg rounded-lg p-4 mt-6">
				<div class="md:w-1/2">
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center w-full md:center">
						<div class="w-full md:w-2/5">Current Ratio</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Dividen Saham (Rp)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Dividen Yield</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Dividen Payout</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Laba bersih / saham</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Nilai Buku</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Debt to Asset Ratio (%)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
				</div>
				<div class="md:w-1/2">
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Debt to Equity Ratio (%)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Return of Assets (%)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Return of Equity (%)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Net Profit Margin (%)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Price to Earning Ratio (%)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="filter-item flex flex-col md:flex-row gap-3 items-center">
						<div class="w-full md:w-2/5">Price to Book Value (%)</div>
						<select name="option" id="option" class="w-full md:w-1/5 text-xs form-input">
							<option value="">di bawah</option>
							<option value="">di atas</option>
						</select>
						<div class="w-full md:w-2/5 flex items-center gap-1">
							<label for="value">Value</label>
							<input type="number" class="form-input text-xs" >
						</div>
					</div>
					<div class="text-center mt-2">
						<button class="imline-block px-6 py-2 bg-green text-white uppercase font-bold rounded-full">Cari</button>
					</div>
				</div>
			</div>


			<div class="result-screening mt-6">
				<h1 class="text-2xl font-bold text-gray-600 mb-2">Hasil Pencarian</h1>
				<table class="rounded-lg w-full shadow-md overflow-auto md:overflow-hidden bg-white p-2">
					<thead  style="background: linear-gradient(45deg, #47a200 40%, #b6ff3e)" class=" text-white">
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
						<tr>
							<td class="p-2 text-center">1</td>
							<td style="width: 70px" class="text-center">BBRI</td>
							<td>PT Bank Rakyat Indonesia Tbk</td>
							<td>Keuangan</td>
							<td style="width: 50px" class="text-center">Tidak</td>
							<td class="col-badge">
								<a href="{{ url('member/report') }}" class="badge bg-green">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
									</svg>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</x-app-layout>



