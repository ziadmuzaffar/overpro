@extends('layouts.auth')

@section('title')
    تسجيل الدخول
@endsection

@section('auth')
    <form action="{{ route('login') }}" method="post" class="auth">
        @csrf
        <h2>OverPro System</h2>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>البريد الالكتروني</label>
                    <i class="fa fa-envelope fa-fw"></i>
                    <input type="email" name="email" autocomplete="off" required autofocus value="{{ old('email') }}" class="form-control">
                    @error('email')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <i class="fa fa-lock fa-fw"></i>
                    <input type="password" name="password" autocomplete="off" required class="form-control">
                    <i class="fa fa-eye fa-fw" id="show-password"></i>
                    @error('password')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    دخول
                </button>
            </div>
        </div>
    </form>
@endsection