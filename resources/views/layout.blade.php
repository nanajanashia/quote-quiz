<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quote quiz</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
{{--        <el-container>--}}
            @yield ('content')
{{--        </el-container>--}}
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
