<header class="bg-blue-900 w-64 h-screen fixed text-white flex flex-col justify-between py-16 top-0 font-semibold">
    <nav>
        <h2 class="text-center text-xl mb-6">Sistem Perpustakaan</h2>
        <ul class="flex flex-col gap-4">
            <li class="px-10 py-3 {{$page == 'dashboard' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/user/dashboard" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/dashboard' . ($page == 'dashboard' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    Dashboard
                </a>
            </li>                            
            <li class="px-10 py-3 {{$page == 'books' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/user/books" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/book' . ($page == 'books' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    Buku
                </a>
            </li>                
            <li class="px-10 py-3 {{$page == 'transaksi' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/user/transactions" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/trans' . ($page == 'transaksi' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    Transaksi
                </a>
            </li>                             
            <li class="px-10 py-3 {{$page == 'history' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/user/history" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/history' . ($page == 'history' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    History
                </a>
            </li>                             
            <li class="px-10 py-3 {{$page == 'change' ? 'bg-[#F2F9FE] text-black rounded-s-lg' : ''}}">
                <a href="/user/change-password" class="flex gap-2">
                    <img src="{{ asset('/assets/icons/password' . ($page == 'change' ? '-dark' : '') . '.svg') }}" alt="logo" class="w-6">
                    Change Password
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