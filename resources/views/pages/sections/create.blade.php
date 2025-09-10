@extends('layouts.template')

@section('icon')
    fa-add
@endsection

@section('title')
    إنشاء قسم
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-warning btn-sm" href="{{ route('sections.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('sections.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>القسم</label>
                    <input type="name" name="name" autocomplete="off" required autofocus value="{{ old('name') }}" class="form-control">
                    @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>الجامعة</label>
                    <select name="university_id" required autofocus class="form-control">
                        <option class="d-none"></option>
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}" @selected($university->id == old('university_id'))>
                                {{ $university->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('university_id')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>إنشاء</span>
                </button>
            </div>
        </div>
    </form>
@endsection