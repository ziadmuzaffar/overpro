@extends('layouts.template')

@section('icon')
    fa-edit
@endsection

@section('title')
    تعديل القسم
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
    <form action="{{ route('sections.update', $section->id) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>القسم</label>
                    <input type="name" name="name" autocomplete="off" required value="{{ $section->name }}" class="form-control">
                    @error('name')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>الجامعة</label>
                    <select name="university_id" required class="form-control">
                        <option class="d-none"></option>
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}" @selected($university->id == $section->university_id)>
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
                <button type="submit" class="btn btn-success">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>تحديث</span>
                </button>
            </div>
        </div>
    </form>
@endsection