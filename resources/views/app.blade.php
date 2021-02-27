<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <!-- Turbolink cache control -->
    <meta name="turbolinks-cache-control" content="no-cache">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- css styles -->    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    
</head>
<body>

<div id="app" data-component="{{ $name }}" data-props="{{ json_encode($data) }}"></div>

</body>
</html>
