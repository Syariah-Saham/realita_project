<form id="modal-delete" class="modal bg-white rounded-lg shadow-lg p-4 md:p-10 fixed top-10 md:top-28 w-full md:w-1/4 mx-auto transform transition duration-1000 z-50" method="post" style="right: 50%;transform: translate(50% , -20%);pointer-events: none;opacity: 0;">
	@csrf
	@method('delete')
	<div class="my-6 text-center">
		<img src="{{ asset('asset/alert/alert_delete.svg ') }}" alt="alert delete image" class="mx-auto mb-4">
		<p>Anda yakin akan menghapus data ini?</p>
	</div>
	<div class="flex flex-row justify-around">
		<button type="button" class="btn close text-white bg-gray-400">Batal</button>
		<button type="submit" class="btn text-white bg-red-400">Hapus</button>
	</div>
</form>