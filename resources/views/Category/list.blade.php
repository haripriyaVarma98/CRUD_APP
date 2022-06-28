<x-layout>
    <div class="relative overflow-x-auto w-full px-6">
        <div class="max-w-lg mx-auto">
            {{-- <h1 class="text-center font-bold text-xl">Categories</h1> --}}
            <div id="dialog-form" title="Create new category" class="bg-grey-500">
                <form class="" id='category-form'>
                    <input type="text" name="new-category" id="new-category" placeholder="Enter new category name" class="my-2 px-2 py-2 mr-2 text-s border border-gray-200 w-60 text ui-widget-content" style="width: 100%">
                    {{-- <button type="submit" class="bg-green-400 hover:bg-green-500 text-white rounded my-2 px-4 py-2">Save</button> --}}
                </form>
            </div>
            <div class="my-2 py-4">
                <a href="#" id='addNew' class="bg-blue-400 text-white rounded py-2 px-2 hover:bg-blue-500">Add new</a>
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <table id="category-table" class="w-full hover stripe py-2 border-collapse border">
                <thead
                    class="mb-2 font-bold text-xs w-full text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- <th class="border px-6 py-3 w-2"></th> --}}
                        <th class="border px-6 py-3">action</th>
                        <th class="border px-6 py-3 w-90">Category name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $value)
                    <tr class="text-center border py-6 category-row" id="{{ $value->id }}">
                        {{-- <td class="border">{{$key+1}}</td> --}}
                        <td class="border w-10 ml-2">
                            <a href="#" class='edit-category btn btn-link text-blue-500 font-semibold'
                                title='Edit'><span class='fa fa-edit'></span></a>
                            <a href="#" class='delete-category btn btn-link text-blue-500 font-semibold'
                                title='Delete'><span class='fa fa-remove'></span></a>
                        </td>
                        <td class="border py-3 category-name">{{$value->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
@include('Category.list-script')