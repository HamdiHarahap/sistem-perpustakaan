<header class="bg-blue-900 w-64 h-screen fixed text-white flex flex-col justify-between py-16 top-0 font-semibold">
    <nav>
        <h2 class="text-center text-xl mb-6">Sistem Perpustakaan</h2>
        <ul class="flex flex-col gap-4">
            <li class="px-10 py-3 {{$page == 'dashboard' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/admin/dashboard" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/dashboard' . ($page == 'dashboard' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    Dashboard
                </a>
            </li>                
            <li class="px-10 py-3 {{$page == 'users' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/admin/users" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/user' . ($page == 'users' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    User
                </a>
            </li>                
            <li class="px-10 py-3 {{$page == 'books' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/admin/books" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/book' . ($page == 'books' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    Buku
                </a>
            </li>                
            <li class="px-10 py-3 {{$page == 'transaksi' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/admin/transactions" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/trans' . ($page == 'transaksi' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    Transaksi
                </a>
            </li>                
            <li class="px-10 py-3 ">
                <a href="/admin/dashboard" class="flex gap-2">
                    <img src="{{asset('/assets/icons/report.svg')}}" alt="logo" class="w-6">
                    Laporan
                </a>
            </li>                
        </ul>
    </nav>
    <div>
        <div class="flex items-center w-full gap-2 px-12 py-3 btn-logout cursor-pointer">
            <img src="{{asset('assets/icons/logout.svg')}}" alt="logo" class="w-6">
            <p>Logout</p>
        </div>
    </div>
</header>