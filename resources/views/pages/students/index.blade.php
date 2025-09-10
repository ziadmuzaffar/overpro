@extends('layouts.template')

@section('icon')
    fa-graduation-cap
@endsection

@section('title')
    الطلاب
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-dark btn-sm" href="#search" onclick="event.preventDefault()">
            <i class="fa fa-search fa-fw"></i>
            <span>البحث</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-primary btn-sm" href="{{route('students.create')}}">
            <i class="fa fa-add fa-fw"></i>
            <span>إنشاء</span>
        </a>
    </li>
@endsection

@section('content')
    <input type="search" name="search" id="search" placeholder="ابحث . . ." class="form-control" style="margin-bottom: 10px;">
    <div class="row">
        @forelse ($students as $student)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-head">
                        <a href="{{route('students.edit', $student->id)}}" class="text-success">
                            <i class="fa fa-edit fa-fw"></i>
                        </a>
                        <a href="#delete" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fa fa-trash fa-fw"></i>
                        </a> 
                        <form action="{{route('students.destroy', $student->id)}}" method="post" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                    <div class="card-body">
                        <i class="fa fa-graduation-cap"></i>
                        <h5 class="card-title">
                            {{ $student->name }}
                        </h5>
                        <p class="card-text">
                            {{ $student->university->name }}
                            -
                            {{ $student->section->name }}
                            -
                            {{ $student->level->name }}
                            -
                            {{ $student->group->number }}
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
    </div>
@endsection