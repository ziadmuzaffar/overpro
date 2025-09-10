@extends('layouts.template')

@section('icon')
    fa-eye
@endsection

@section('title')
    تقرير الحضور والغياب
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
                <th colspan="19">
                    <div class="d-flex justify-content-evenly">
                        <span>
                            الجامعة:
                            {{ DB::table('universities')->where('id', $request->university_id)->first()->name }}
                        </span>
                        <span>
                            القسم:
                            {{ DB::table('sections')->where('id', $request->section_id)->first()->name }}
                        </span>
                        <span>
                            المجموعة:
                            {{ DB::table('groups')->where('id', $request->group_id)->first()->number }}
                        </span>
                    </div>
                </th>
            </tr>
            <tr>
                <th rowspan="2">م</th>
                <th rowspan="2">اسم الطالب</th>
                <th colspan="12">عدد المحاضرات</th>
                <th colspan="2">الاجمالي</th>
                <th rowspan="2">ملاحظات</th>
            </tr>
            <tr>
                @for ($i = 1; $i <= 12; $i++)
                    <th>{{ $i }}</th>
                @endfor
                <th>الحضور</th>
                <th>الغياب</th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1 ?>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $n++ }}</td>
                    <td>{{ $student->name }}</td>
                    @for ($i = 1; $i <= 12; $i++)
                        <td>
                            @if ($student->attendances()->where('lecture', $i)->count() > 0)
                                @if ($student->attendances()->where('lecture', $i)->first()->status == '1')
                                    <i class="fa fa-check fa-fw text-primary"></i>
                                @elseif ($student->attendances()->where('lecture', $i)->first()->status == '0')
                                    <i class="fa fa-xmark fa-fw text-danger"></i>
                                @endif
                            @endif
                        </td>
                    @endfor
                    <td>
                        {{ $student->attendances()->where('status', 1)->count() }}
                    </td>
                    <td>
                        {{ $student->attendances()->where('status', 0)->count() }}
                    </td>
                    <td>
                        @if ($student->attendances()->where('status', 1)->count() == 0)
                            منقطع
                        @elseif ($student->attendances()->where('status', 0)->count() >= 5)
                            حرمان
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection