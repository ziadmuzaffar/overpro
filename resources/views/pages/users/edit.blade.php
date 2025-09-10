@extends('layouts.template')

@section('icon')
    fa-edit
@endsection

@section('title')
    تعديل المستخدم
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-warning btn-sm" href="{{ route('users.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label>الاسم الكامل</label>
                    <input type="name" name="name" autocomplete="off" required value="{{ $user->name }}" class="form-control">
                    @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label>البريد الالكتروني</label>
                    <input type="email" name="email" autocomplete="off" required value="{{ $user->email }}" class="form-control">
                    @error('email')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" autocomplete="off" class="form-control">
                    @error('password')
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