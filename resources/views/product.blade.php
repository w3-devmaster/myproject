@extends('layouts.app')
@section('main')
    <div class="container py-5">
        <div class="row">
            <div class="col-6 mx-auto mb-5">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>เข้าสู่ระบบ</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="login-form">
                            <div class="form-group mb-3">
                                <label for="username">ชื่อผู้ใช้งาน</label>
                                <input id="username" type="text" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">รหัสผ่าน</label>
                                <input id="password" type="password" class="form-control" >
                            </div>
                            <p class="text-center" >
                                <button id="login" class="btn btn-primary rounded-pill" >เข้าสู่ระบบ</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h1 class="text-center">สินค้าทั้งหมด</h1>
                <button class="btn btn-primary rounded-pill mb-3" id="load">โหลดข้อมูลสินค้า</button>
                <table id="product-table" class="table table-striped table-sm table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>ซื้อไปแล้ว</th>
                            <th>เพิ่มเมื่อ</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    var token = ''


    $(document).ready(() => {
        const login = () => {
            let username = $('#username').val()
            let password = $('#password').val()

            if(username.length > 4 && password.length > 4){
                $.ajax({
                    url: 'https://learning.test/api/auth',
                    type: 'POST',
                    data: {
                        email: username,
                        password: password
                    },
                    success: (resp) => {
                        $('#login-form').html(`<p class="text-center" >ยินดีต้อนรับ : ${resp.user.name}</p>`)
                        token = resp.user.access_token
                    }
                })
            }else{
                alert('กรอก Username กับ Password ให้ถูกต้อง')
                return false
            }

        }




        const loadData = () => {
            if(token.length > 0){
                $.ajax({
                    url: 'https://learning.test/api/products',
                    type: 'GET',
                    header: {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + token
                    },
                    beforeSend: () => {
                        $('#product-table tbody').html('')
                    },
                    success: (resp) => {
                        $.each(resp.data,(k,v)=>{
                            let tr = `
                            <tr>
                                <td>${k+1}</td>
                                <td>${v.productName}</td>
                                <td>${v.amount}</td>
                                <td>${v.price}</td>
                                <td>${v.buy}</td>
                                <td>${v.createdAt}</td>
                            </tr>
                            `
                            $('#product-table tbody').append(tr)
                        })
                    }
                })
            }else{
                alert('กรุณาเข้าสู่ระบบ')
            }

        }

        $('#load').click(()=>{
            loadData()
        })

        $('#login').click(()=>{
            login()
        })

    })
</script>
@endsection
