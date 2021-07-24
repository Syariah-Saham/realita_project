@extends('layouts.admin')
@section('title'  , 'Buat Laporan Keuangan')
@section('body')
@include('vendor.components.modal-delete')

<div class="flex flex-row gap-4 pb-20">
	<form action="{{ url('/admin/report/create') }}" method="post" class="w-2/3">
		@csrf
		<div class="bg-white rounded-xl shadow-lg p-4">
			<h1 class="text-2xl font-bold text-gray-600">Buat Laporan Keuangan</h1>
			<div class="flex flex-row gap-2">
				<div class="form-group  w-2/3">
					<label for="" class="form-label">Kode Emiten</label>
					<select name="stock_id" id="stock_id" class="form-input @error('stock_id') is-invalid @enderror  w-full">
						<option value="">-- Pilih Kode Emiten --</option>
						@foreach($stocks as $stock)
							<option value="{{ $stock->id }}">{{ $stock->code_issuers }}</option>
						@endforeach
					</select>
					@include('vendor.components.error' , ['name' => 'stock_id'])
				</div>
				<div class="form-group w-1/3">
					<label for="periode_id" class="form-label">Periode</label>
					<select name="periode_id" id="periode_id" class="form-input @error('periode_id') is-invalid @enderror  w-full">
						<option value="">-- Pilih Periode --</option>
						@foreach($periodes as $periode)
							<option value="{{ $periode->id }}">{{ $periode->year }}</option>
						@endforeach
					</select>
					@include('vendor.components.error' , ['name' => 'periode_id'])
				</div>
			</div>
		</div>
		<div class="bg-white rounded-xl shadow-lg p-4 mt-4">
			<h1 class="text-2xl font-bold text-gray-600 text-center mb-2">Laporan Neraca</h1>
			<div class="flex flex-row gap-2">
				<div class="w-1/3">
					<h3 class="text-lg font-semibold text-gray-400">Aset</h3>
					<div class="form-group">
						<label for="lancar" class="form-label">Lancar</label>
						<input type="number" name="asset_current"  value="{{ old('asset_current') }}" class="form-input @error('asset_current') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'asset_current'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Non Lancar</label>
						<input type="number" name="asset_n_current"  value="{{ old('asset_n_current') }}" class="form-input @error('asset_n_current') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'asset_n_current'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Total</label>
						<input type="number" name="asset_total"  value="{{ old('asset_total') }}" class="form-input @error('asset_total') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'asset_total'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Pertumbuhan</label>
						<input type="number"  name="asset_growth" step="0.01" value="{{ old('asset_growth') }}" class="form-input @error('asset_growth') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'asset_growth'])
					</div>
				</div>
				<div class="w-1/3">
					<h3 class="text-lg font-semibold text-gray-400">Liabilitas</h3>
					<div class="form-group">
						<label for="lancar" class="form-label">Jangka Pendek</label>
						<input type="number" name="liability_current" value="{{ old('liability_current') }}" class="form-input @error('liability_current') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'liability_current'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Jangka Panjang</label>
						<input type="number" name="liability_n_current" value="{{ old('liability_n_current') }}" class="form-input @error('liability_n_current') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'liability_n_current'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Total</label>
						<input type="number" name="liability_total" value="{{ old('liability_total') }}" class="form-input @error('liability_total') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'liability_total'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Pertumbuhan</label>
						<input type="number" name="liability_growth" step="0.01" value="{{ old('liability_growth') }}" class="form-input @error('liability_growth') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'liability_growth'])
					</div>
				</div>
				<div class="w-1/3">
					<h3 class="text-lg font-semibold text-gray-400">Ekuitas</h3>
					<div class="form-group">
						<label for="lancar" class="form-label">Pemilik Entitas Produk</label>
						<input type="number" name="equity_parent" value="{{ old('equity_parent') }}" class="form-input @error('equity_parent') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'equity_parent'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Non Pengendali</label>
						<input type="number" name="equity_not_controller" value="{{ old('equity_not_controller') }}" class="form-input @error('equity_not_controller') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'equity_not_controller'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Total</label>
						<input type="number" name="equity_total" value="{{ old('equity_total') }}" class="form-input @error('equity_total') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'equity_total'])
					</div>
					<div class="form-group">
						<label for="lancar" class="form-label">Pertumbuhan</label>
						<input type="number" name="equity_growth" step="0.01" value="{{ old('equity_growth') }}" class="form-input @error('equity_growth') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'equity_growth'])
					</div>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-xl shadow-lg p-4 mt-4">
			<h1 class="text-2xl font-bold text-gray-600 text-center mb-2">Laporan Laba Rugi</h1>
			<div class="flex flex-row gap-2">
				<div class="w-1/2">
					<div class="form-group">
						<label for="pendapatan" class="form-label">Total Pendapatan</label>
						<input type="number" name="revenue_total" value="{{ old('revenue_total') }}" class="form-input @error('revenue_total') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'revenue_total'])
					</div>
					<div class="form-group">
						<label for="pertumbuhan" class="form-label">Pertumbuhan</label>
						<input type="number" name="revenue_growth" step="0.01" value="{{ old('revenue_growth') }}" class="form-input @error('revenue_growth') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'revenue_growth'])
					</div>
				</div>
				<div class="w-1/2">
					<div class="form-group">
						<label for="pendapatan" class="form-label">Total Laba Bersih</label>
						<input type="number" name="net_profit_total" value="{{ old('net_profit_total') }}" class="form-input @error('net_profit_total') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'net_profit_total'])
					</div>
					<div class="form-group">
						<label for="pertumbuhan" class="form-label">Pertumbuhan</label>
						<input type="number" name="net_profit_growth" step="0.01" value="{{ old('net_profit_growth') }}" class="form-input @error('net_profit_growth') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'net_profit_growth'])
					</div>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-xl shadow-lg p-4 mt-4">
			<h1 class="text-2xl font-bold text-gray-600 text-center mb-2">Rasio Keuangan</h1>
			<div class="flex flex-row gap-2">
				<div class="w-1/3">
					<div class="form-group">
						<label for="curent_ration" class="form-label">Current Ratio</label>
						<input type="number" name="current_ratio" step="0.01" value="{{ old('current_ratio') }}" class="form-input @error('current_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'current_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Dividen Saham (Rp)</label>
						<input type="number" name="dividend_nominal" step="0.01" value="{{ old('dividend_nominal') }}" class="form-input @error('dividend_nominal') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'dividend_nominal'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Dividen Yield</label>
						<input type="number" name="dividend_yield" step="0.01" value="{{ old('dividend_yield') }}" class="form-input @error('dividend_yield') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'dividend_yield'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Dividen Payout (%)</label>
						<input type="number" name="dividend_payout" step="0.01" value="{{ old('dividend_payout') }}" class="form-input @error('dividend_payout') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'dividend_payout'])
					</div>
				</div>
				<div class="w-1/3">
					<div class="form-group">
						<label for="curent_ration" class="form-label">Laba bersih / saham</label>
						<input type="number" name="net_profit" step="0.01" value="{{ old('net_profit') }}" class="form-input @error('net_profit') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'net_profit'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Nilai Buku</label>
						<input type="number" name="book_value" step="0.01" value="{{ old('book_value') }}" class="form-input @error('book_value') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'book_value'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Debt to Asset Ratio (x)</label>
						<input type="number" name="debt_asset_ratio" step="0.01" value="{{ old('debt_asset_ratio') }}" class="form-input @error('debt_asset_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'debt_asset_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Debt to Equity Ratio (x)</label>
						<input type="number" name="debt_equity_ratio" step="0.01" value="{{ old('debt_equity_ratio') }}" class="form-input @error('debt_equity_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'debt_equity_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Return of Assets (%)</label>
						<input type="number" name="return_of_assets" step="0.01" value="{{ old('return_of_assets') }}" class="form-input @error('return_of_assets') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'return_of_assets'])
					</div>
				</div>
				<div class="w-1/3">
					<div class="form-group">
						<label for="curent_ration" class="form-label">Return of Equity (%)</label>
						<input type="number" name="return_of_equity" step="0.01" value="{{ old('return_of_equity') }}" class="form-input @error('return_of_equity') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'return_of_equity'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Net Profit Margin (%)</label>
						<input type="number" name="net_profit_margin" step="0.01" value="{{ old('net_profit_margin') }}" class="form-input @error('net_profit_margin') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'net_profit_margin'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Price to Earning Ratio (x)</label>
						<input type="number" name="price_to_earning_ratio" step="0.01" value="{{ old('price_to_earning_ratio') }}" class="form-input @error('price_to_earning_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'price_to_earning_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Price to Book Value (x)</label>
						<input type="number" name="price_to_book_value" step="0.01" value="{{ old('price_to_book_value') }}" class="form-input @error('price_to_book_value') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'price_to_book_value'])
					</div>
				</div>
			</div>
		</div>

		<div class="bg-white rounded-xl shadow-lg p-4 mt-4 flex flex-row gap-2">
			<div class="form-group w-1/2">
				<label class="form-label">Harga</label>
				<input type="number" name="cost" value="{{ old('cost') }}" class="form-input @error('cost') is-invalid @enderror ">
				@include('vendor.components.error' , ['name' => 'cost'])
			</div>
			<div class="form-group w-1/2">
				<label class="form-label">Jumlah Saham</label>
				<input type="number" name="total_stock" value="{{ old('total_stock') }}" class="form-input @error('total_stock') is-invalid @enderror ">
				@include('vendor.components.error' , ['name' => 'total_stock'])
			</div>
		</div>

		<button class="btn mb-6">Tambah</button>
	</form>
	<div class="w-1/3">
		<table class="w-full rounded shadow-lg overflow-hidden">
			<thead class="bg-gr text-white">
				<tr>
					<th class="p-2">Periode</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@forelse($periodes as $periode)
					<tr>
						<td class="p-2">{{ $periode->year }}</td>
						<td class="col-badge">
							<button data-action="{{ url('admin/periode/'.$periode->id) }}" class="badge badge-delete bg-red">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
								</svg>
							</button>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="2" class="text-center font-bold p-2">Tidak ada data</td>
					</tr>
				@endforelse
			</tbody>
		</table>
		<a href="{{ url('/admin/periode/create') }}" class="btn">Tambah Periode</a>
	</div>
</div>

@endsection
		