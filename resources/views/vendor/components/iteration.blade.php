@php
	if(!isset($_GET['page'])) {
		$page = 0;
	} else {
		$page = $_GET['page']-1;
	}
@endphp

<th class="p-2 text-center text-green-400">{{ $page * $paginate  + $loop->iteration }}</th>
