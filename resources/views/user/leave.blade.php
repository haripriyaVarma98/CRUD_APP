<x-layout>
    <section class="px-6 py-8">
        {{-- <h1 class="text-center font-bold text-xl">User profile</h1> --}}
        <main class="max-w-lg mx-auto bg-gray-100 mt-10 border border-gray-200 p-6 rounded-xl">
            <div class="mb-6 form-inline">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Leave Date
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="requested_date" id="leave-date" value="" placeholder="select date">
                @error('requested_date')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class='mb-6'>
                <button type='submit' class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'>
                    Submit
                </button>
            </div>
        </main>
    </section>
</x-layout>
@include('user.leave-script')