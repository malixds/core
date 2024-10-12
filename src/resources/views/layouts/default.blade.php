<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/searchPosts.js', 'resources/js/searchExecutors.js', 'resources/js/Composable/Chat.js'])
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
</head>

<body>
    <div class="relative">
        @include('includes.header')
            @yield('content')
        <div class="chat" id="chat">
            @yield('chat')
        </div>
    </div>
    <script src="https://kit.fontawesome.com/ca0dc65707.js" crossorigin="anonymous"></script>
{{--    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</body>

</html>
