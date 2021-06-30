<x-app-layout>

    <div class="py-6 md:pb-12 pb-15 mb-20 md:mb-12 px-1 lg:px-8">
    	<div class="items mt-5 flex flex-col md:flex-row w-full gap-2">
            @php
                $total_item = $items->count();
                $chunk_row = ceil($total_item / 3);
            @endphp
    		@forelse($items->chunk($chunk_row) as $chunk)
    			<div class="flex flex-col gap-2 w-full">
    				@foreach($chunk as $item)
    					<div class="bg-white w-full rounded-sm shadow-md p-3">
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



