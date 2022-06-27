<x-layout>
    <x-flash-msg />
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
                <label for="company" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    company
                </label>
                <input class="border border-gray-400 p-2 w-full rounded" type="text" name="company" id="company"
                    value="{{ auth()->user()->company->name }}" readonly>
            </div>
            <div class="mb-6 form-inline">
                <div class="block mb-2">
                    <label for="address" class="uppercase font-bold text-xs text-gray-700">address</label>
                </div>
                <div>
                    <table id="address-table" class="w-full">
                        <tbody>
                            @foreach (auth()->user()->address as $val)
                                <tr class="p-2 w-full rounded bg-white border border-gray-200"
                                    id='address-row-{{ $val->id }}'>
                                    <td class='address-td w-full p-2' data-id="{{ $val->id }}">{!! nl2br($val->address) !!}</td>
                                    <td class="float-right w-10 ml-2" data-id="{{ $val->id }}">
                                        <a href="#" class='editAddress btn btn-link text-blue-500 font-semibold'
                                            title='Edit'><span class='fa fa-edit'></span></a>
                                        <a href="#" class='deleteAddress btn btn-link text-blue-500 font-semibold'
                                            title='Delete'><span class='fa fa-remove'></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @error('address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <button id="add_new_address" title='Add New Address'
                        class="float-right text-sm font-semibold text-white bg-blue-500 rounded-full w-5 text-center mt-2"><i
                            class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="mb-6 form-inline">
                <a href="/home/applyLeave" class="block mb-2 font-bold text-xs text-blue-500" id="applyLeave">
                    Apply Leave
                </a>
            </div>
        </main>
    </section>
</x-layout>
@include('user.home-script')
