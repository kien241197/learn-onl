@extends('layouts.user')

@section('content')
    @include('component.site-banner')
    @include('component.site-about')
	<!-- Khóa học -->
    @include('component.site-course')
	<!-- Khóa học -->
    @include('component.site-huongdan')
    @include('component.site-feedback')
    @include('component.site-res')
@endsection