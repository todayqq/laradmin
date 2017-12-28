<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @section('htmlheader')
        @include('admin.layouts.partials.html-header')
    @show
</head>

<body class="hold-transition {{config('admin.skin')}} {{join(' ', config('admin.layout'))}}">

<div class="wrapper">

    @include('admin.layouts.partials.header')

    @include('admin.layouts.partials.sidebar')

    <div class="content-wrapper">
        @yield('main-content')
    </div>

    @include('admin.layouts.partials.footer')

</div>

@section('scripts')
    @include('admin.layouts.partials.scripts')
    @include('admin.layouts.partials.toastr')
@show

</body>
</html>
