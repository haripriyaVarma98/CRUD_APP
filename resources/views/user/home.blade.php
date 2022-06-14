<x-layout>
    <x-flash-msg/>
    <section class="px-6 py-8">
        <h1 class="text-center font-bold text-xl">User profile</h1>
        <main class="max-w-lg mx-auto bg-gray-100 mt-10 border border-gray-200 p-6 rounded-xl">
            <div class="mb-6 form-inline">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Name
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="name" id="name"
                    value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="mb-6 form-inline">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    User Name
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="username" id="username"
                    value="{{ auth()->user()->username }}" readonly>
            </div>
            <div class="mb-6 form-inline">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Email
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="email" id="email"
                    value="{{ auth()->user()->email }}" readonly>
            </div>
            <div class="mb-6 form-inline">
                <label for="address" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    address
                </label>
                @if (auth()->user()->address ?? false)
                    <div>
                        <table class="w-full">
                            <tbody>
                                @foreach (auth()->user()->address as $val)
                                <tr class="p-2 w-full rounded bg-white">
                                    <td>
                                        {!! nl2br($val->address) !!}
                                    </td>
                                    <td class="float-right">
                                        <a href="/address/edit/{{$val->id}}" class='editAddress btn btn-link' title='Edit'><span
                                                class='fa fa-edit'></span></a>
                                        <a href="/address/delete?id={{$val->id}}" class='deleteAddress btn btn-link' title='Delete'><span
                                                class='fa fa-remove'></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </main>
    </section>
</x-layout>
