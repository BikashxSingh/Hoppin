<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{config('app.name',  'MySite')}}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <main class="">
            @yield('content')
        </main>
            
    </div>
    
</body>
</html>