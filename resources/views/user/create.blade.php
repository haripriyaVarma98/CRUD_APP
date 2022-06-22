<x-layout>
    <section class="px-6 py-2">
        <h1 class="text-center font-bold text-xl">Register</h1>
        <main class="max-w-lg mx-auto bg-gray-100 mt-2 border border-gray-200 p-6 rounded-xl">
            <form action="/register" method="post" class=''>
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="text" name="name" id="name" value="{{old('name')}}" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        User Name
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="text" name="username" id="username"
                        value="{{old('username')}}" required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        email
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="text" name="email" id="email"
                        value="{{old('email')}}" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="company" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        company
                    </label>
                    <select name="company_id" id="company_id" value="{{old('company_id')}}" class="border border-gray-400 p-2 w-full rounded" >
                        <option value="">Please select</option>
                        @foreach ($companies as $key => $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="company" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        department
                    </label>
                    <select name="department_id" id="department_id" value="{{old('department_id')}}" class="border border-gray-400 p-2 w-full rounded" >
                        <option value="">Please select</option>
                        @foreach ($departments as $key => $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="password" name="password"
                        id="password" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class='mb-6'>
                    <button type='submit' class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'>
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
