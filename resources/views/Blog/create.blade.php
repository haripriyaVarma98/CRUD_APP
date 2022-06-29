<x-layout>
    <main class="max-w-6xl mx-auto space-y-6">
        <h1 class="text-center font-bold text-xl">Create New Blog</h1>
        <div class=" mt-8 flex flex-col justify-between bg-gray-200 border border-gray-400 rounded-xl">
            {{-- <div class="pb-6"> --}}
                @if (count($errors) > 0)
                    <div class="bg-red-200">
                        There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="blog-form" class="px-10 py-4 mt-4" action="/blogs/save">
                    @csrf
                    <div class="mb-6">
                        <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Category
                        </label>
                        <select name="category" id="category" value="{{old('category')}}" class="border border-gray-400 p-2 w-full rounded" required>
                            <option value="">Please select</option>
                            @foreach ($categories as $key => $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="author" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            author
                        </label>
                        <select name="author" id="author" value="{{old('author')}}" class="border border-gray-400 p-2 w-full rounded" required>
                            <option value="">Please select</option>
                            @foreach ($authors as $key => $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                        @error('author')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Title
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded" type="text" name="title" id="title" value="{{old('title')}}" required placeholder="enter the title of blog">
                        @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="brief" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            brief
                        </label>
                        <textarea class="border border-gray-400 p-2 w-full rounded" type="text" name="brief" id="brief" value="{{old('brief')}}" required placeholder="enter a brief about the blog"></textarea>
                        @error('brief')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="content" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            content
                        </label>
                        <textarea class="border border-gray-400 p-2 w-full rounded" type="text" name="content" id="content" value="{{old('content')}}" required placeholder="enter the content of blog"></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Image
                        </label>
                        <input class="border border-gray-400 p-2 w-full rounded" type="file" name="image" id="image" required accept=".jpg, .png, .gif, .jpeg">
                        @error('image')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class='mb-6'>
                        <button type='submit' class='bg-green-400 text-white rounded py-2 px-4 hover:bg-green-500'>
                            Save
                        </button>
                    </div>
                </form>
            {{-- </div> --}}
        </div>
    </main>
</x-layout>
@include('Blog.create-script')
