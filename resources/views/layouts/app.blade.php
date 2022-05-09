<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <title>{{ $title }}</title>
</head>
<body>
<div class="container">
    @if(Session::has('title'))
        @if(Session::get('title') == 'Success')
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
{{--                    <p class="alert-heading"><b>{{ Session::get('title') }}</b></p>--}}
                    {{ Session::get('msg') }}
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
{{--                    <p class="alert-heading"><b>{{ Session::get('title') }}</b></p>--}}
                    {{ Session::get('msg') }}
                </div>
            </div>
        </div>
        @endif
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
                <div class="alert alert-danger mt-3">
                    {{$error}}
                </div>
        @endforeach
    @endif

    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
<script>
    $(function () {

    });
</script>
</body>
</html>
