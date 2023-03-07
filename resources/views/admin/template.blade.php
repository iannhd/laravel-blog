@extends('layouts.app')

@section('title', 'Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('library/select2/dist/css/select2.min.css')}}">
@endpush

@stack('addon-style')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('sub-judul')</h1>
            </div>

            <div class="section-body">
               @yield('content')
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
