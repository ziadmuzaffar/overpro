@extends('layouts.template')

@section('icon')
    fa-edit
@endsection

@section('title')
    تعديل الجامعة
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-warning btn-sm" href="{{ route('universities.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('universities.update', $university->id) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>الجامعة</label>
                    <input type="name" name="name" autocomplete="off" required value="{{ $university->name }}" class="form-control">
                    @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>تحديث</span>
                </button>
            </div>
        </div>
    </form>
@endsection