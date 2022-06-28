<!doctype html>

<title>Laravel CRUD app</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
<link rel="stylesheet" href="https://cdn.datatables.net/v/ju/dt-1.12.1/datatables.min.css" type="text/css"/>
<script src="https:////cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.serializeObject/2.0.3/jquery.serializeObject.min.js" integrity="sha512-DNziaT2gAUenXiDHdhNj6bfk1Ivv72gpxOeMT+kFKXB2xG/ZRtGhW2lDJI9a+ZNCOas/rp4XAnvnjtGeMHRNyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="/toastr/build/toastr.css" rel="stylesheet">
<script src="/toastr/toastr.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                @if (auth()->user()->username == 'admin')
                    <a href="/users" class="text-s text-blue-500 ml-6">Users</a>
                    <a href="/appliedLeaves" class="text-s text-blue-500 ml-6">Leave requests</a>
                @endif
                @endauth
            </div>
            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <span class="text-xs font-bold uppercase">{{auth()->user()->name}}</span>
                    <a href="/home" class="text-s text-blue-500 ml-6">Profile</a>
                    <form action="/logout" method="post" class="text-s font-semibold text-blue-500 ml-6">
                        @csrf
                        <button type="submit" class="">Log out</button>
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    
                    <a href="/login" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Login
                    </a>
                @endauth
            </div>
        </nav>

        {{$slot}}

    </section>
</body>
