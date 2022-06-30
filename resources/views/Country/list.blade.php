<x-layout>
    <main class="max-w-6xl mx-auto space-y-6 text-center">
        <div class="mb-6 text-center">
            <label for="country" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Country list
            </label>
            <select name="country" id="country-list" class="border border-gray-400 px-4 py-2 rounded">
                <option value="">Please select</option>
                @foreach ($countries as $key => $country)
                    <option value="{{$country->timezone}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="max-w-6xl mx-auto px-10 mb-10 text-center">
            <div class="mt-5 max-w-2xl mx-auto">
                <div class="px-4 py-2 text-center">
                    <section id="show-time" class="hidden text-m px-8 py-4 my-4">
                        <div class="comment-body">
                            <header class="comment-row font-bold text-center">
                                <h3 class="">Current time</h3>
                                <h3 class="text-green-400" id="current-time"></h3>
                            </header>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</x-layout>
@include('Country.script')
