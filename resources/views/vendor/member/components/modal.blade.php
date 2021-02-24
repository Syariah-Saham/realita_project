@if(session($session))
<div class="w-full flex justify-center">
    <div class="modal transition duration-500 ease-in lg:w-1/3 bg-white shadow-lg rounded-xl fixed z-50 text-center py-6 px-4 mt-6 mx-1.5" style="opacity: 0; transform: translateY(-10%);">
        <img src="{{ asset('asset/dashboard/sorry-illustrasi.svg') }}" alt="sorry illustrasi" class="w-72 mx-auto mb-6">
        <p class="text-sm">{{ session($session) }}</p>
        <div class="flex justify-evenly items-center mt-3">
            <button class="btnModalClose bg-gr2 rounded-full px-5 h-8 uppercase text-white font-semibold shadow-md hover:shadow-sm focus:outline-none">Tidak</button>
            <a href="{{ url('member/package') }}" class="btn">Cek Paket</a>
        </div>
    </div>
</div>
@endif