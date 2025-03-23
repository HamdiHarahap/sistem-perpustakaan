<x-layout>
    <x-slot:title>Change Password</x-slot:title>
    <x-slot:page>{{$page}}</x-slot:page>

    <section class="ps-[18rem] flex flex-col gap-10 py-10">
        <aside class="bg-[#FFFFFF] flex justify-between p-5 items-center rounded-lg mr-4 mt-4">
            <div class="font-semibold">
                <h2 class="text-sm">Menu</h2>
                <h1 class="text-2xl">Change Password</h1>
            </div>
        </aside>
        <div class="mr-4 bg-[#FFFFFF] rounded-lg p-5">
            <form action="{{route('user.change', ['id' => $user->id])}}" class="flex flex-col gap-2 w-2/5" method="POST">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="current" class="text-sm font-semibold">Current Password</label>
                    <input id="current" type="password" name="current" class="p-2 rounded-md border-2">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password" class="text-sm font-semibold">New Password</label>
                    <input id="password" type="password" name="password" class="p-2 rounded-md border-2">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="confirm" class="text-sm font-semibold">Confirm Password</label>
                    <input id="confirm" type="password" name="confirm" class="p-2 rounded-md border-2">
                </div>
                <button type="submit" class="py-2 mt-2 bg-blue-500 rounded-md text-white w-fit px-4">Save Changes</button>
            </form>
        </div>
    </section>
</x-layout>