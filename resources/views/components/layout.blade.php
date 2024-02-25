<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoveieParadise | {{$title}}</title>
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <main class="dark:bg-gray-900">

        <x-side-bar></x-side-bar>
        <header>
            <x-nav-bar></x-nav-bar>
        </header>
       

        @if ($errors->any())
        <div class="alert alert-danger  w-50 position-fixed" style="right: 5px; top:5px">
        <div class="d-flex justify-content-between position-relative">
            <ul class="m-0 list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <a href="">
            <i class="bi bi-x-circle-fill text-dark fs-4"></i></a>
            </div>
        </div>
        @endif
        {{$slot}}
        <footer class="text-danger text-center py-3">
            Copyright © 2024 MoveieParadise, Inc.
        </footer>
    </main>

</body>

</html>