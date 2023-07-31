@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-6 col-12 mx-auto">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('admin.register') }}" method="post">
                @csrf
                <h4 class="text-center">ลงทะเบียน</h4>
                <div class="form-group mb-3">
                    <label for="name">ชื่อ</label>
                    <input id="name" type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input id="username" type="text" name="username"
                        class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">อีเมล</label>
                    <input id="email" type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="pass">รหัสผ่าน</label>
                    <input id="pass" type="password" name="pass"
                        class="form-control @error('pass') is-invalid @enderror">
                    @error('pass')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" value="ลงทะเบียน" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
