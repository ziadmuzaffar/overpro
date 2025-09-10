@extends('layouts.template')

@section('icon')
    fa-people-group
@endsection

@section('title')
    المجموعات
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-primary btn-sm" href="{{route('groups.create')}}">
            <i class="fa fa-add fa-fw"></i>
            <span>إنشاء</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row">
        @forelse ($groups as $group)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-head">
                        <a href="{{route('groups.edit', $group->id)}}" class="text-success">
                            <i class="fa fa-edit fa-fw"></i>
                        </a>
                        <a href="#delete" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fa fa-trash fa-fw"></i>
                        </a> 
                        <form action="{{route('groups.destroy', $group->id)}}" method="post" class="d-none">
                            @csrf @method('DELETE')
                        </form>
                    </div>
                    <div class="card-body">
                        <i>{{ $group->number }}</i>
                        <h5 class="card-title">
                            {{ $group->university->name }}
                            -
                            {{ $group->section->name }}
                            -
                            {{ $group->level->name }}
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