@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-6 col-12 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <div class="card-title">
                    เข้าสู่ระบบ
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.auth') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="username">ชื่อผู้ใช้</label>
                        <input id="username" type="text" name="username"
                            class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">รหัสผ่าน</label>
                        <input id="password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" value="เข้าสู่ระบบ" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
