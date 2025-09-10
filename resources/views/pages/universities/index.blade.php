@extends('layouts.template')

@section('icon')
    fa-school
@endsection

@section('title')
    الجامعات
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-primary btn-sm" href="{{route('universities.create')}}">
            <i class="fa fa-add fa-fw"></i>
            <span>إنشاء</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        @forelse ($universities as $university)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-head">
                        <a href="{{route('universities.edit', $university->id)}}" class="text-success">
                            <i class="fa fa-edit fa-fw"></i>
                        </a>
                        <a href="#delete" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fa fa-trash fa-fw"></i>
                        </a> 
                        <form action="{{route('universities.destroy', $university->id)}}" method="post" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                    <div class="card-body">
                        <i class="fa @yield('icon') fa-fw"></i>
                        <h5 class="card-title">
                            {{ $university->name }}
                        </h5>
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