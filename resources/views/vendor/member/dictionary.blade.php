<x-app-layout>

    <div class="py-6 md:pb-12 pb-15 mb-20 md:mb-12 px-1 lg:px-8">
    	<div class="items mt-5">
    		@forelse($items->chunk(3) as $chunk)
    			<div class="flex flex-col md:flex-row gap-2 my-2 md:gap-4 md:my-4">
    				@foreach($chunk as $item)
    					<div class="bg-white w-full md:w-1/2 lg:w-1/3 md:my-4 rounded-sm shadow-md p-3">
    						<h3 class="font-semibold text-sm md:text-lg">
    							<span>{{ $item->keyword }}</span>
    						</h3>
    						<p class="text-xs md:text-sm">{{ $item->description }}</p>
    					</div>
    				@endforeach
    			</div>
    		@empty
    			<h1>Tidak ada data</h1>
    		@endforelse
    	</div>
    </div>




</x-app-layout>



