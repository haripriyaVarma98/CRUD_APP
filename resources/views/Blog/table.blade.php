<div class="relative overflow-x-auto w-full px-6">
    <div class="">
        <div class="my-2 py-4">
            <a href="/blogs/create" id='addNew' class="bg-blue-400 text-white rounded py-2 px-2 hover:bg-blue-500">Add
                new</a>
        </div>
        @if ($blogs->count())
        <table id="category-table" class="w-full hover stripe py-2 border-collapse border">
            <thead
                class="mb-2 font-bold text-xs w-full text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="border px-6 py-3 w-2"></th>
                    <th class="border px-6 py-3 w-5">action</th>
                    <th class="border px-6 py-3 w-90">Title</th>
                    <th class="border px-6 py-3">Author</th>
                    <th class="border px-6 py-3">Category</th>
                    <th class="border px-6 py-3">Comments count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $key => $blog)
                    <tr class="border p-6 category-row" id="{{ $blog->id }}">
                        <td class="border px-6">{{ $key + 1 }}</td>
                        <td class="border text-center py-3 px-6">
                            <button class='delete-category btn btn-link text-blue-500 font-semibold'
                                title='Delete'><i class='fa fa-remove'></i></button>
                        </td>
                        <td class="border py-3 category-name text-blue-500 px-6">
                            <a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
                        </td>
                        <td class="border py-3 category-name px-6">{{ $blog->author->name }}</td>
                        <td class="border py-3 category-name px-6">{{ $blog->category->name }}</td>
                        <td class="border py-3 category-name px-6">{{ $blog->comments->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="my-4"><p class="text-center">No blogs found!!</p></div>
        @endif
        {{-- <div class="my-4">{{$blogs->links()}}</div> --}}
    </div>
</div>

<script>
    $('.delete-category').click(function() {
        var id = $(this).closest('tr').attr('id');
        console.log(id);
        if (confirm('Are you sure to delete?')) {
            $.ajax({
                url: '/blog/delete?id=' + id,
                type: "GET",
                success: function(response) {
                    if (response.status == 'success') {
                        toastr.success('Blog deleted successfully!');
                        $('#' + id).remove();
                    } else {
                        toastr.error('Failed to delete!');
                    }
                }
            })
        }
    })
</script>