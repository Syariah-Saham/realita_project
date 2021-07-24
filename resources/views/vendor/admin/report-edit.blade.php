@extends('layouts.admin')
@section('title'  , 'Edit Laporan Keuangan')
@section('body')

<div class="flex flex-row gap-4 pb-20">
	<form action="{{ url('/admin/report/' . $stock->id . '/' . $periode->year) }}" method="post" class="w-full">
		@csrf
		@method('put')
		<div class="bg-white rounded-xl shadow-lg p-4">
			<h1 class="text-2xl font-bold text-gray-600">Edit Laporan Keuangan</h1>
			<div class="flex flex-row gap-2">
				<div class="form-group  w-2/3">
					<label for="stock" class="form-label">Kode Emiten</label>
                    <input type="text" readonly class="form-input @error('stock_id') is-invalid @enderror  w-full" name="stock_id" value="{{ $stock->code_issuers }}" >
					@include('vendor.components.error' , ['name' => 'stock_id'])
				</div>
				<div class="form-group w-1/3">
					<label for="periode_id" class="form-label">Periode</label>
                    <input type="text" readonly class="form-input @error('periode_id') is-invalid @enderror  w-full" name="periode_id" value="{{ $periode->year }}">
					@include('vendor.components.error' , ['name' => 'periode_id'])
				</div>
			</div>
		</div>
		<div class="flex flex-col md:flex-row gap-4">
			<div class="bg-white rounded-xl shadow-lg p-4 mt-4 md:w-2/3">
				<h1 class="text-2xl font-bold text-gray-600 text-center mb-2">Laporan Neraca</h1>
				@php
					$asset = $balance->asset;
					$liability = $balance->liability;
					$equity = $balance->equity;
				@endphp
				<div class="flex flex-row gap-2">
					<div class="w-1/3">
						<h3 class="text-lg font-semibold text-gray-400">Aset</h3>
						<div class="form-group">
							<label for="lancar" class="form-label">Lancar</label>
							<input type="number" name="asset_current"  value="{{ $asset->current }}" class="form-input @error('asset_current') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'asset_current'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Non Lancar</label>
							<input type="number" name="asset_n_current"  value="{{ $asset->n_current }}" class="form-input @error('asset_n_current') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'asset_n_current'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Total</label>
							<input type="number" name="asset_total"  value="{{ $asset->total }}" class="form-input @error('asset_total') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'asset_total'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Pertumbuhan</label>
							<input type="number"  name="asset_growth" step="0.01" value="{{ $asset->growth * 100 }}" class="form-input @error('asset_growth') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'asset_growth'])
						</div>
					</div>
					<div class="w-1/3">
						<h3 class="text-lg font-semibold text-gray-400">Liabilitas</h3>
						<div class="form-group">
							<label for="lancar" class="form-label">Jangka Pendek</label>
							<input type="number" name="liability_current" value="{{ $liability->current }}" class="form-input @error('liability_current') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'liability_current'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Jangka Panjang</label>
							<input type="number" name="liability_n_current" value="{{ $liability->n_current }}" class="form-input @error('liability_n_current') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'liability_n_current'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Total</label>
							<input type="number" name="liability_total" value="{{ $liability->total }}" class="form-input @error('liability_total') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'liability_total'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Pertumbuhan</label>
							<input type="number" name="liability_growth" step="0.01" value="{{ $liability->growth * 100 }}" class="form-input @error('liability_growth') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'liability_growth'])
						</div>
					</div>
					<div class="w-1/3">
						<h3 class="text-lg font-semibold text-gray-400">Ekuitas</h3>
						<div class="form-group">
							<label for="lancar" class="form-label">Pemilik Entitas Produk</label>
							<input type="number" name="equity_parent" value="{{ $equity->parent }}" class="form-input @error('equity_parent') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'equity_parent'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Non Pengendali</label>
							<input type="number" name="equity_not_controller" value="{{ $equity->not_controller }}" class="form-input @error('equity_not_controller') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'equity_not_controller'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Total</label>
							<input type="number" name="equity_total" value="{{ $equity->total }}" class="form-input @error('equity_total') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'equity_total'])
						</div>
						<div class="form-group">
							<label for="lancar" class="form-label">Pertumbuhan</label>
							<input type="number" name="equity_growth" step="0.01" value="{{ $equity->growth * 100 }}" class="form-input @error('equity_growth') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'equity_growth'])
						</div>
					</div>
				</div>
			</div>
			<div class="bg-white rounded-xl shadow-lg p-4 mt-4 md:w-1/3">
				<h1 class="text-2xl font-bold text-gray-600 text-center mb-2">Laporan Laba Rugi</h1>
					<div class="w-full">
						<div class="form-group">
							<label for="pendapatan" class="form-label">Total Pendapatan</label>
							<input type="number" name="revenue_total" value="{{ $profit->revenue }}" class="form-input @error('revenue_total') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'revenue_total'])
						</div>
						<div class="form-group">
							<label for="pertumbuhan" class="form-label">Pertumbuhan</label>
							<input type="number" name="revenue_growth" step="0.01" value="{{ $profit->revenue_growth * 100 }}" class="form-input @error('revenue_growth') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'revenue_growth'])
						</div>
					</div>
					<div class="w-full">
						<div class="form-group">
							<label for="pendapatan" class="form-label">Total Laba Bersih</label>
							<input type="number" name="net_profit_total" value="{{ $profit->net_profit }}" class="form-input @error('net_profit_total') is-invalid @enderror ">
							@include('vendor.components.error' , ['name' => 'net_profit_total'])
						</div>
						<div class="form-group">
							<label for="pertumbuhan" class="form-label">Pertumbuhan</label>
							<input type="number" name="net_profit_growth" step="0.01" value="{{ $profit->net_profit_growth * 100 }}" class="form-input @error('net_profit_growth') is-invalid @enderror ">
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
						<input type="number" name="current_ratio" step="0.01" value="{{ Number::float($ratio->current_ratio) }}" class="form-input @error('current_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'current_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Dividen Saham (Rp)</label>
						<input type="number" name="dividend_nominal" step="0.01" value="{{ Number::float($ratio->dividend_nominal) }}" class="form-input @error('dividend_nominal') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'dividend_nominal'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Dividen Yield (%)</label>
						<input type="number" name="dividend_yield" step="0.01" value="{{ $ratio->dividend_yield * 100 }}" class="form-input @error('dividend_yield') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'dividend_yield'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Dividen Payout (%)</label>
						<input type="number" name="dividend_payout" step="0.01" value="{{ $ratio->dividend_payout * 100 }}" class="form-input @error('dividend_payout') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'dividend_payout'])
					</div>
				</div>
				<div class="w-1/3">
					<div class="form-group">
						<label for="curent_ration" class="form-label">Laba bersih / saham</label>
						<input type="number" name="net_profit" step="0.01" value="{{ Number::float($ratio->net_profit) }}" class="form-input @error('net_profit') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'net_profit'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Nilai Buku</label>
						<input type="number" name="book_value" step="0.01" value="{{ Number::float($ratio->book_value) }}" class="form-input @error('book_value') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'book_value'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Debt to Asset Ratio (x)</label>
						<input type="number" name="debt_asset_ratio" step="0.01" value="{{ Number::float($ratio->debt_asset_ratio) }}" class="form-input @error('debt_asset_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'debt_asset_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Debt to Equity Ratio (x)</label>
						<input type="number" name="debt_equity_ratio" step="0.01" value="{{ Number::float($ratio->debt_equity_ratio) }}" class="form-input @error('debt_equity_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'debt_equity_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Return of Assets (%)</label>
						<input type="number" name="return_of_assets" step="0.01" value="{{ $ratio->return_of_assets * 100 }}" class="form-input @error('return_of_assets') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'return_of_assets'])
					</div>
				</div>
				<div class="w-1/3">
					<div class="form-group">
						<label for="curent_ration" class="form-label">Return of Equity (%)</label>
						<input type="number" name="return_of_equity" step="0.01" value="{{ $ratio->return_of_equity * 100 }}" class="form-input @error('return_of_equity') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'return_of_equity'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Net Profit Margin (%)</label>
						<input type="number" name="net_profit_margin" step="0.01" value="{{ $ratio->net_profit_margin * 100 }}" class="form-input @error('net_profit_margin') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'net_profit_margin'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Price to Earning Ratio (x)</label>
						<input type="number" name="price_to_earning_ratio" step="0.01" value="{{ Number::float($ratio->price_to_earning_ratio) }}" class="form-input @error('price_to_earning_ratio') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'price_to_earning_ratio'])
					</div>
					<div class="form-group">
						<label for="curent_ration" class="form-label">Price to Book Value (x)</label>
						<input type="number" name="price_to_book_value" step="0.01" value="{{ Number::float($ratio->price_to_book_value) }}" class="form-input @error('price_to_book_value') is-invalid @enderror ">
						@include('vendor.components.error' , ['name' => 'price_to_book_value'])
					</div>
				</div>
			</div>
		</div>

		<button class="btn mb-6">Edit</button>
	</form>
</div>

@endsection
		