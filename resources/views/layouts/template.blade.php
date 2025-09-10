@include('layouts.header')
@include('layouts.loading')
<div class="wrapper">
    <div class="sidebar">
        <i class="fa fa-recycle"></i>
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-chart-pie fa-fw"></i>
                    <span>لوحة التحكم</span>
                </a>
            </li>
            <li>
                <a href="{{ route('universities.index') }}">
                    <i class="fa fa-school fa-fw"></i>
                    <span>الجامعات</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sections.index') }}">
                    <i class="fa fa-puzzle-piece fa-fw"></i>
                    <span>الاقسام</span>
                </a>
            </li>
            <li>
                <a href="{{ route('levels.index') }}">
                    <i class="fa fa-layer-group fa-fw"></i>
                    <span>المستويات</span>
                </a>
            </li>
            <li>
                <a href="{{ route('groups.index') }}">
                    <i class="fa fa-people-group fa-fw"></i>
                    <span>المجموعات</span>
                </a>
            </li>
            <li>
                <a href="{{ route('students.index') }}">
                    <i class="fa fa-graduation-cap fa-fw"></i>
                    <span>الطلاب</span>
                </a>
            </li>
            <li>
                <a href="{{ route('attendances.index') }}">
                    <i class="fa fa-eye fa-fw"></i>
                    <span>الحضور والغياب</span>
                </a>
            </li>
            <li>
                <a href="{{ route('shares.index') }}">
                    <i class="fa fa-share fa-fw"></i>
                    <span>المشاركات</span>
                </a>
            </li>
            <li>
                <a href="{{ route('exams.index') }}">
                    <i class="fa fa- fa-fw"></i>
                    <span>الاختبارات</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reports.index') }}">
                    <i class="fa fa-bug fa-fw"></i>
                    <span>التقارير</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="topbar">
            <div class="topbar-title">
                <span>OverPro</span>
            </div>
            <div class="topbar-actions">
                <div class="dropdown">
                    <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i>
                    </span>
                    <ul class="dropdown-menu">
                        <p>{{ auth()->user()->email }}</p>
                        <i class="fa fa-recycle"></i>
                        <p>{{ auth()->user()->name }}</p>
                        <div>
                            <a href="{{ route('users.edit', auth()->id()) }}">
                                الملف الشخصي
                            </a>
                            <a href="#delete" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                تسجيل الخروج
                            </a>
                            <form action="{{ route('logout') }}" method="post" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" onclick="event.preventDefault()">
                        <i class="fa @yield('icon') fa-fw"></i>
                        <span>@yield('title')</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars fa-fw"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            @yield('navbar-nav')
                        </ul>
                    </div>
                </div>
            </nav>
            @include('layouts.modal')
            @yield('content')
            <div class="footer">
                <p>
                    Made With
                    Love
                    <i class="fa fa-heart"></i>
                    By
                    <a href="https://ziadmuzaffar.github.io/my-profile" target="_blank">
                        Ziad Muzaffar
                    </a>
                    &copy; 2025
                </p>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
