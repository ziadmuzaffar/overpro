@extends('layouts.template')

@section('icon')
    fa-chart-pie
@endsection

@section('title')
    لوحة التحكم
@endsection

@section('content')
    @include('pages.dashboard.boards')
@endsection