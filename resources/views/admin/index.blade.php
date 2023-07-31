@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="alert alert-success">ยินดีต้อนรับกลับนะครับ คุณ {{ Auth::guard('admins')->user()->name }}</div>

            <pre>
 {!! print_r(Auth::guard('admins')->user()) !!}
            </pre>
        </div>
    </div>
@endsection
