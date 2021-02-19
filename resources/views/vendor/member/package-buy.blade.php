<x-app-layout>
	<div class="py-4 px-1 md:px-4 pb-12">
        <div class="max-w-7xl md:px-4 sm:px-6 lg:px-8 pb-20">
        	<h1 class="text-2xl font-bold text-gray-600">Beli Paket</h1>
        	<div class="flex flex-col md:flex-row gap-4 mt-4">
        		<div class="w-full md:w-1/3 bg-purple-500 text-white rounded-lg shadow-lg text-center p-4 py-6">
        		    <h2 class="text-3xl font-bold">{{ $package->name }}</h2>
        		    <p class="text-sm md:text-lg">{{ $package->description }}</p>
        		    <div class="my-3">
        		        <h1 class="text-2xl md:text-4xl mt-2 font-bold ">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
        		        <s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
        		    </div>
        		    <ul class="text-left text-sm md:text-lg my-2">
        		        <li class="my-1">{{ $package->report }} periode laporan keuangan</li>
        		        <li class="my-1">{{ $package->screening }} screening fundamental</li>
        		        <li class="my-1">{{ $package->compare }} comparasi emiten</li>
        		    </ul>
        		</div>
        		<div class="w-full md:w-1/3 ">
        			@foreach($banks as $bank)
        				<div class="bg-white rounded-md shadow-md px-6 py-3 mb-3 flex flex-row justify-between">
        					<div data-id="{{ $bank->id }}">
        						<h2 class="text-sm md:text-lg font-light">{{ $bank->name }}</h2>
        						<h1 class="font-semibold text-lg md:text-3xl text-orange-500">{{ $bank->card_number }}</h1>
        						<p class="text-sm md:text-lg font-bold">{{ $bank->bank }}</p>
        					</div>
        					<div>
        						<button class="bg-gr p-1 text-white btn-bank">
                                    <svg class="h-4 w-4 md:h-6 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
        						</button>
        					</div>
        				</div>
        			@endforeach
        		</div>
        		<div class="w-full md:w-1/3 ">
        			<form action="{{ url('member/package/'.$package->id.'/send') }}" method="post" id="form" enctype="multipart/form-data" class="bg-white rounded-md shadow-md px-5 py-6 invisible">
        				@csrf
        				<div class="border-b-2 border-gray-100 pb-2 mb-2">
        					<h2 class="text-lg font-semibold">Transfer ke</h2>
        					<input type="hidden" name="bank_id">
        					<input type="hidden" name="package_id" value="{{ $package->id }}">
        					<div class="form-group">
        						<label for="name" class="form-label">Nama</label>
        						<input type="text" name="name" readonly class="form-input">
        					</div>
        					<div class="form-group">
        						<label for="card_number" class="form-label">No. Rekening</label>
        						<input type="text" name="card_number" readonly class="form-input">
        					</div>
        					<div class="form-group">
        						<label for="bank" class="form-label">Bank</label>
        						<input type="text" name="bank" readonly class="form-input">
        					</div>
        				</div>
        				<div class="form-group">
        					<label for="proof" class="form-label text-lg font-semibold">Upload Bukti Pembayaran</label>
        					<input type="file" name="proof_payment" class="form-input">
        				</div>
        				<div class="text-center">
	        				<button class="btn">Kirim</button>
        				</div>
        			</form>
        		</div>
	        </div>
        </div>
    </div>

    @section('script')
    	<script>
    		
    		const btnBanks = document.querySelectorAll('.btn-bank');
    		const form = document.getElementById('form');

    		btnBanks.forEach(btn => {
    			btn.addEventListener('click' , function() {
					let element    = btn.parentElement.parentElement.firstElementChild;
					let bankId     = element.getAttribute('data-id');
					let name       = element.children[0].innerHTML;
					let cardNumber = element.children[1].innerHTML;
					let bank       = element.children[2].innerHTML;


					form.bank_id.value     = bankId;
					form.name.value        = name;
					form.card_number.value = cardNumber;
					form.bank.value        = bank;
					form.classList.remove('invisible');
    			});
    		})

    	</script>
    @endsection
</x-app-layout>
