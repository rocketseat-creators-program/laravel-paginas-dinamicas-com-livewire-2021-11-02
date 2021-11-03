<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @livewireStyles
</head>

<body>
    <!-- header -->

    @yield('content')
    {{ $slot }}

    <!-- footer -->
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
