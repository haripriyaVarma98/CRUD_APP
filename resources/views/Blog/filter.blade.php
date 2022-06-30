<x-layout>
    <h1 class="text-center font-bold text-xl">Blogs</h1>
    <main class="px-2 mx-auto bg-gray-100 my-5 border border-gray-200 p-6 rounded-xl">
        <form id="filter-blogs" class="w-full">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3 md:items-center">
                <div class="px-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                        Category filter
                    </label>
                    <select name="category" id="category"
                        class="text-sm block py-2 px-3 leading-tight rounded focus:outline-none focus:bg-white cursor-pointer">
                        <option value="">All</option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="px-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="author">
                        Author filter
                    </label>
                    <select name="author" id="author"
                        class="text-sm block py-2 px-3 leading-tight rounded focus:outline-none focus:bg-white cursor-pointer">
                        <option value="">All</option>
                        @foreach ($authors as $key => $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="px-6 md:mb-0 text-xs">
                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="addressFilter">
                        Comment count
                    </label>
                    <div class="flex justify-center">
                        <input type="number" name="comment_count" id="comment_count" placeholder="comments count" class="border border-gray-400 p-2 rounded mr-4 mb-2">
                    </div>
                </div>
                <div class="px-6 md:mb-0 text-xs">
                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="addressFilter">
                        Search
                    </label>
                    <div class="flex justify-center">
                        <span class="relative">
                            <input type="text" name="search" id="" placeholder="search title" class="border border-gray-400 p-2 rounded mb-2"><i class="fa fa-search absolute right-4 py-3"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="md:flex">
                <div class="md:w-full">
                    <button type="submit" id="submitFilter"
                        class='float-right bg-blue-400 hover:bg-blue-500 text-white md:items-center text-sm rounded py-2 px-2 mr-6'>Submit</button>
                </div>
            </div>
        </form>
    </main>
    <div id="blog-div"></div>
</x-layout>
@include('Blog.filter_script')
