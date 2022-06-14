<x-layout>
    <section class="px-6 py-8">
        <x-flash-msg/>
        <h1 class="text-center font-bold text-xl">Sign In</h1>
        <main class="max-w-lg mx-auto bg-gray-100 mt-10 border border-gray-200 p-6 rounded-xl">
            <form action="/login" method="post" class='mt-10'>
                @csrf
                @error('error')
                    <p class="text-red-500 text-xs mt-0 mb-5">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        User Name
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="text" name="username" id="username"
                        value="{{old('username')}}" required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
               
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="password" name="password"
                        id="password" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class='mb-6'>
                    <button type='submit' class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'>
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
