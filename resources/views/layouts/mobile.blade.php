
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>百宝星阁</title>
        <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('/css/mobile.css')}}" rel="stylesheet" type="text/css">
        @yield('css')
        <script type="text/javascript" src="{{asset('/js/jquery-3.1.0.min.js')}}" ></script>
    <body>
        <div class="content">
            @yield('content')
        </div>
    </body>
    @yield('js')
</html>
