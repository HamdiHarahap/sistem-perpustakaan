<x-layout>
    <x-slot:title>Loginpage</x-slot:title>

    <section class="flex min-h-screen items-center flex-col justify-center">
        <h2 class="font-bold text-xl">Log in to Perpustakaan</h2>
        <form action="{{route('login.post')}}" class="mx-auto mt-6 flex flex-col gap-3" method="POST">
            @csrf
            <div class="flex flex-col gap-1">
                <label for="email" class="font-semibold">Email</label>
                <input type="email" id="email" name="email" class="border-2 bg-transparent rounded-md px-2 py-1 w-[25rem] outline-blue-600">
            </div>
            <div class="flex flex-col gap-1">
                <label for="password" class="font-semibold">Password</label>
                <input type="password" id="password" name="password" class="border-2 bg-transparent rounded-md px-2 py-1 w-[25rem] outline-blue-600">
            </div>
            <button type="submit" class="bg-indigo-600 rounded-lg text-white font-semibold py-2 mt-3">Log in</button>
        </form>
        <span class="mt-3">
            Don't have an account? <a href="/register" class="text-blue-600 font-semibold">Register now</a>  
        </span> 
    </section>  

</x-layout>