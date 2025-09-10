@extends('layouts.template')

@section('icon')
    fa-bug
@endsection

@section('title')
    التقارير
@endsection

@section('content')
    <form action="{{ route('reports.show') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>النوع</label>
                    <select name="type" required class="form-control">
                        <option class="d-none"></option>
                        <option value="attendance" @selected(old('type') == 'attendance')>
                            الحضور والغياب
                        </option>
                        <option value="exams" @selected(old('type') == 'exams')>
                            الاختبارات
                        </option>
                    </select>
                    @error('type')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>الجامعة</label>
                    <select name="university_id" required class="form-control">
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
            <div class="col-sm-4">
                <div class="form-group">
                    <label>القسم</label>
                    <select name="section_id" required class="form-control">
                        <option class="d-none"></option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" @selected($section->id == old('section_id')) data-university="{{ $section->university_id }}" class="d-none">
                                {{ $section->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>المستوى</label>
                    <select name="level_id" required class="form-control">
                        <option class="d-none"></option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" @selected($level->id == old('level_id')) data-section="{{ $level->section_id }}" class="d-none">
                                {{ $level->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('level_id')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>المجموعة</label>
                    <select name="group_id" required class="form-control">
                        <option class="d-none"></option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" @selected($group->id == old('group_id')) data-level="{{ $group->level_id }}" class="d-none">
                                {{ $group->number }}
                            </option>
                        @endforeach
                    </select>
                    @error('group_id')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>التقرير</span>
                </button>
            </div>
        </div>
    </form>
@endsection