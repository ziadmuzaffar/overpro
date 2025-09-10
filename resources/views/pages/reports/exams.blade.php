@extends('layouts.template')

@section('icon')
    fa-
@endsection

@section('title')
    تقرير الاختبارات
@endsection

@section('navbar-nav')
    <li class="nav-item">
        <a class="btn btn-dark btn-sm" href="#search" onclick="event.preventDefault()">
            <i class="fa fa-search fa-fw"></i>
            <span>البحث</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-warning btn-sm" href="{{ route('reports.index') }}">
            <i class="fa fa-chevron-right fa-fw"></i>
            <span>رجوع</span>
        </a>
    </li>
@endsection

@section('content')
    <input type="search" name="search" id="search" placeholder="ابحث . . ." class="form-control" style="margin-bottom: 10px;">
    <table class="table">
        <thead>
            <tr>
                <th>م</th>
                <th>اسم الطالب</th>
                <th>الدرجة</th>
                <th>ملاحظات</th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1 ?>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $n++ }}</td>
                    <td>{{ $exam->student->name }}</td>
                    <td>{{ $exam->degree }}</td>
                    <td>
                        @if ($exam->student->attendances()->where('status', 1)->count() == 0)
                            منقطع
                        @elseif ($exam->student->attendances()->where('status', 0)->count() >= 5)
                            حرمان
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection