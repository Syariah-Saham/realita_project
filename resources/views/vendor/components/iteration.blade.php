@php
	if(!isset($_GET['page'])) {
		$page = 0;
	} else {
		$page = $_GET['page']-1;
	}
@endphp

<th class="w-5 md:w-10 md:p-2 text-center text-green-400">{{ $page * $paginate  + $loop->iteration }}</th>
