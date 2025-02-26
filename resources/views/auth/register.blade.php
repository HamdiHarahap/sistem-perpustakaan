<x-layout>
    <x-slot:title>Registrerpage</x-slot:title>
    <section class="flex flex-col items-center justify-center min-h-screen">
        <div class="flex flex-col items-center">
            <h2 class="font-bold text-xl">Register your account</h2>
            <form action="{{route('register.post')}}" class="mx-auto mt-6 flex flex-col gap-3" method="POST">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="username" class="font-semibold">Nama</label>
                    <input type="text" id="username" name="name" class="border-2 bg-transparent rounded-md px-2 py-1 w-[25rem] outline-blue-600">
                    @error('name')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
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
                <div class="flex flex-col gap-1">
                    <label for="password" class="font-semibold">Confirm Password</label>
                    <input type="password" id="password" name="confirm" class="border-2 bg-transparent rounded-md px-2 py-1 w-[25rem] outline-blue-600">
                    @error('confirm')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror 
                </div>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 rounded-lg text-white font-semibold py-2 mt-3">Register</button>
            </form>
            <span class="mt-3">
                Already have an account? <a href="/login" class="text-blue-600 hover:text-blue-800 font-semibold">log in now</a>  
            </span>
        </div>
    </section>    
</x-layout>