@extends('layouts.template')

@section('icon')
    fa-edit
@endsection

@section('title')
    تعديل الإختبار
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
    <form action="{{ route('exams.update') }}" method="post" style="background: none; padding: 0;">
        @csrf @method('PUT')
        <div class="row">
            @forelse ($exams as $exam)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa @yield('icon')"></i>
                            <h5 class="card-title">
                                {{ $exam->student->name }}
                            </h5>
                            <p class="card-text">
                                <input type="number" name="degree[{{ $exam->id }}]" placeholder="Degree" autocomplete="off" required class="form-control text-center" value="{{ $exam->degree }}" min="0" max="10" maxlength="2">
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
                <button type="submit" class="btn btn-success" style="margin-bottom: 25px;">
                    <i class="fa @yield('icon') fa-fw"></i>
                    <span>تحديث</span>
                </button>
            </div>
        </div>
    </form>
@endsection