<x-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3">
        <table class="table border border-gray-200 p-6 w-full">
            <thead
                class="mb-2 font-bold text-xs w-full text-blue-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">username</th>
                    <th class="px-6 py-3">email id</th>
                    <th class="px-6 py-3">address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-sm bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-semibold text-blue-400">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->username }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->address->count() ? $user->address->first()->address : '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
