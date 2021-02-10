<x-app-layout>

    <div class="py-6 pb-12 mb-12 px-3 lg:px-8">
    	<form action="" class="flex flex-col items-center justify-center">
            <img src="{{ asset('asset/dashboard/illustrasi.svg') }}" alt="illustrasi" class="w-1/3">
            <h1  class="text-2xl font-bold text-gray-600">Comparison Emiten</h1>
            <div class="w-54">
                <input type="text" class="form-input rounded-full px-8" placeholder="Ketik kode emiten...">
            </div>
        </form>



        <div class="result-compare grid grid-cols-2 md:grid-cols-5 gap-2 mt-6">
        	<div class="col-span-2 rounded-lg shadow-md bg-white overflow-hidden">
        		<h1 class="font-bold text-3xl text-center uppercase py-2 bg-blue-400 text-white m-2 rounded mb-4">Indikator</h1>
        		<div class="list-value">
        			<p class="p-2">Current Ratio</p>
        			<p class="p-2 bg-gray-200">Dividen Saham (Rp)</p>
        			<p class="p-2">Dividen Yield</p>
        			<p class="p-2 bg-gray-200">Dividen Payout</p>
        			<p class="p-2">Laba bersih / saham</p>
        			<p class="p-2 bg-gray-200">Nilai Buku</p>
        			<p class="p-2">Debt to Asset Ratio (%)</p>
        			<p class="p-2 bg-gray-200">Debt to Equity Ratio (%)</p>
        			<p class="p-2">Return of Assets (%)</p>
        			<p class="p-2 bg-gray-200">Return of Equity (%)</p>
                    <p class="p-2">Net Profit Margin (%)</p>
                    <p class="p-2 bg-gray-200">Price to Earning Ratio (%)</p>
                    <p class="p-2">Price to Book Value (%)</p>
        		</div>
        	</div>
        	<div class="rounded-lg shadow-md bg-white">
        		<h1 class="font-bold text-3xl text-center uppercase py-2 bg-teal-400 text-white m-2 rounded mb-4">BBRI</h1>
        		<div class="list-value text-center">
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
                    <p class="p-2">1.00.</p>
                    <p class="p-2 bg-gray-200">1.00.</p>
                    <p class="p-2">1.00.</p>
        		</div>
        		<div class="text-center">
	        		<button class="font-bold text-md text-center uppercase py-1 px-4 bg-red text-white my-2 rounded inline-block">HAPUS</button>
        		</div>
        	</div>
        	<div class="rounded-lg shadow-md bg-white">
        		<h1 class="font-bold text-3xl text-center uppercase py-2 bg-purple-400 text-white m-2 rounded mb-4">BBCA</h1>
        		<div class="list-value text-center">
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
                    <p class="p-2">1.00.</p>
                    <p class="p-2 bg-gray-200">1.00.</p>
                    <p class="p-2">1.00.</p>
        		</div>
        		<div class="text-center">
	        		<button class="font-bold text-md text-center uppercase py-1 px-4 bg-red text-white my-2 rounded inline-block">HAPUS</button>
        		</div>
        	</div>
        	<div class="rounded-lg shadow-md bg-white">
        		<h1 class="font-bold text-3xl text-center uppercase py-2 bg-orange-400 text-white m-2 rounded mb-4">BBNI</h1>
        		<div class="list-value text-center">
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
        			<p class="p-2">1.00.</p>
        			<p class="p-2 bg-gray-200">1.00.</p>
                    <p class="p-2">1.00.</p>
                    <p class="p-2 bg-gray-200">1.00.</p>
                    <p class="p-2">1.00.</p>
        		</div>
        		<div class="text-center">
	        		<button class="font-bold text-md text-center uppercase py-1 px-4 bg-red text-white my-2 rounded inline-block">HAPUS</button>
        		</div>
        	</div>
        </div>
    </div>







</x-app-layout>



