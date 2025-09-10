@extends('layouts.template')

@section('icon')
    fa-add
@endsection

@section('title')
    إنشاء إختبار
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-dark btn-sm" href="#search" onclick="event.preventDefault()">
            <i class="fa fa-search fa-fw"></i>
            <span>البحث</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-warning btn-sm" href="{{ route('exams.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <input type="search" name="search" id="search" placeholder="ابحث . . ." class="form-control" style="margin-bottom: 10px;">
    <form action="{{ route('exams.store') }}" method="post" style="background: none; padding: 0;">
        @csrf
        <input type="hidden" name="chapter" value="{{ $request->chapter }}">
        <input type="hidden" name="university_id" value="{{ $request->university_id }}">
        <input type="hidden" name="section_id" value="{{ $request->section_id }}">
        <input type="hidden" name="level_id" value="{{ $request->level_id }}">
        <input type="hidden" name="group_id" value="{{ $request->group_id }}">
        <div class="row">
            @forelse ($students as $student)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa @yield('icon')"></i>
                            <h5 class="card-title">
                                {{ $student->name }}
                            </h5>
                            <p class="card-text">
                                <input type="number" name="degree[{{ $student->id }}]" placeholder="Degree" autocomplete="off" required class="form-control text-center" value="0" min="0" max="10" maxlength="2">
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <span>لا يوجد سجلات جديدة</span>
                    </div>
                </div>
            @endforelse
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="margin-bottom: 25px;">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>إنشاء</span>
                </button>
            </div>
        </div>
    </form>
@endsection