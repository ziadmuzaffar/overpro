@extends('layouts.template')

@section('icon')
    fa-edit
@endsection

@section('title')
    تعديل المجموعة
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-warning btn-sm" href="{{ route('groups.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <form action="{{ route('groups.update', $group->id) }}" method="post">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>المجموعة</label>
                    <input type="number" name="number" autocomplete="off" required value="{{ $group->number }}" class="form-control">
                    @error('number')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>الجامعة</label>
                    <select name="university_id" required class="form-control">
                        <option class="d-none"></option>
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}" @selected($university->id == $group->university_id)>
                                {{ $university->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('university_id')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>القسم</label>
                    <select name="section_id" required class="form-control">
                        <option class="d-none"></option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" @selected($section->id == $group->section_id) data-university="{{ $section->university_id }}" class="d-none">
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>المستوى</label>
                    <select name="level_id" required class="form-control">
                        <option class="d-none"></option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" @selected($level->id == $group->level_id) data-section="{{ $level->section_id }}" class="d-none">
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('level_id')
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