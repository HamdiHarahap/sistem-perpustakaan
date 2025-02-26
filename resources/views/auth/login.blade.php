<x-layout>
    <x-slot:title>Loginpage</x-slot:title>

    <section class="flex min-h-screen items-center flex-col justify-center">
        <div class="flex flex-col items-center">
            <h2 class="font-bold text-xl">Log in to Perpustakaan</h2>
            @if (session('error'))
            <div class="bg-red-500 rounded-lg mx-auto py-3 w-full mt-6 px-3 text-white">
                <p>{{session('error')}}</p>
            </div>
            @endif
            <form action="{{route('login.post')}}" class="mx-auto mt-6 flex flex-col gap-3" method="POST">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="text" id="email" name="email" class="border-2 bg-transparent rounded-md px-2 py-1 w-[25rem] outline-blue-600">
                    @error('email')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password" class="font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="border-2 bg-transparent rounded-md px-2 py-1 w-[25rem] outline-blue-600">
                    @error('password')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 rounded-lg text-white font-semibold py-2 mt-3">Log in</button>
            </form>
            <span class="mt-3">
                Don't have an account? <a href="/register" class="text-blue-600 hover:text-blue-800 font-semibold">Register now</a>  
            </span> 
        </div>
    </section>  

</x-layout>