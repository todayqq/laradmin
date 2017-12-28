@extends('admin.layouts.index')

@section('main-content')
    
    @yield('content-header')

    <section class="content">

        @include('admin.layouts.partials.error')
        @include('admin.layouts.partials.success')
        @include('admin.layouts.partials.exception')

        @yield('content')

    </section>
@endsection