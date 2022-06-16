<x-layout>
    <div class="relative overflow-x-auto w-full px-6">
        <h2 class="text-center font-bold text-xl">Users</h2>
        <table id="usersTable" class="hover stripe py-2">
            <thead
                class="mb-2 font-bold text-xs w-full text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">username</th>
                    <th class="px-6 py-3">email id</th>
                    <th class="px-6 py-3">address</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-layout>

<script type="text/javascript">
    $(document).ready( function () {
        $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/users',
                type: 'POST',
                data: {
                "_token": "{{ csrf_token() }}",
                },
            },
            columns: [
                { data: 'name' },
                { data: 'username' },
                { data: 'email' },
                { data: 'address' },
            ],
            paging: true,
            // scrollY: 300,
            search: {
                return: true,
            },
            ordering:  false,
            info: true,
        });

        $('nav').remove();
    });
</script>