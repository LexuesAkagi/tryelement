<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>TryElement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        @vite('resources/css/app.css')
    </head>

    <body>
            @include('commons.error_messages')

            @yield('content')
    </body>
</html>