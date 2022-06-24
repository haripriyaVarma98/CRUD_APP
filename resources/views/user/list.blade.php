<x-layout>
    @include('user.form')
    <div class="relative overflow-x-auto w-full px-6">
        <table id="usersTable" class="hover stripe py-2">
            <thead
                class="mb-2 font-bold text-xs w-full text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">username</th>
                    <th class="px-6 py-3">email id</th>
                    <th class="px-6 py-3">address</th>
                    <th class="px-6 py-3">company
                        {{-- <select class='font-bold uppercase text-gray-700' name='company_list' id='company_list'>
                            <option value="">Company</option>
                            @foreach ($companies as $key => $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select> --}}
                    </th>
                    <th>Current Salary</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-layout>
@include('user.list-script')