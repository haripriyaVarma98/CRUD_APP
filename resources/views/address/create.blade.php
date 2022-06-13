
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 mt-10 border border-gray-200 p-6 rounded-xl">
            <form action="/address/save" method="post" class='mt-10'>
                @csrf
                @error('error')
                    <p class="text-red-500 text-xs mt-0 mb-5">{{ $message }}</p>
                @enderror
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="mb-6">
                    <label for="address" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        New address
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full rounded" type="textarea" name="address" id="address"
                        value="{{$data->address ?? ''}}" required>{{$data->address ?? ''}}</textarea>
                        <input type="hidden" name='id' value="{{$data->id ?? 0}}">
                    @error('address')
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
