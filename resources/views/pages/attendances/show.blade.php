@extends('layouts.template')

@section('icon')
    fa-
@endsection

@section('title')
    كشف الحضور والغياب
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-dark btn-sm" href="#search" onclick="event.preventDefault()">
            <i class="fa fa-search fa-fw"></i>
            <span>البحث</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-warning btn-sm" href="{{ route('attendances.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <input type="search" name="search" id="search" placeholder="ابحث . . ." class="form-control" style="margin-bottom: 10px;">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" rowspan="2">#</th>
                    <th scope="col" rowspan="2">اسم الطالب</th>
                    <th scope="col" colspan="12">المحاظرات</th>
                </tr>
                <tr>
                    @for ($i = 1; $i <= 12; $i++)
                        <th scope="col">{{ $i }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $student->name }}</td>
                        @for ($i = 1; $i <= 12; $i++)
                            <td class="status-attendance">
                                @if ($student->attendances()->where('lecture', $i)->where('student_id', $student->id)->where('status', 0)->count() > 0)
                                    <i class="fa fa-xmark fa-fw"></i>
                                @elseif ($student->attendances()->where('lecture', $i)->where('student_id', $student->id)->where('status', 1)->count() > 0)
                                    <i class="fa fa-check fa-fw"></i>
                                @else
                                    <i class="fa fa-minus fa-fw"></i>
                                @endif
                                <span
                                    data-url="{{ route('attendances.store') }}"
                                    data-token="{{ csrf_token() }}"
                                    data-lecture="{{ $i }}"
                                    data-student="{{ $student->id }}"
                                    data-university="{{ $student->university_id }}"
                                    data-section="{{ $student->section_id }}"
                                    data-level="{{ $student->level_id }}"
                                    data-group="{{ $student->group_id }}">
                                </span>
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
@endpush