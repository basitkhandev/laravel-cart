@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            <form id="loginForm"  @submit.prevent="login">
                <input type="hidden" class="form-control" id="csrf" value="{{csrf_token()}}" />
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div id="loginError" class="text-danger mt-3"></div>
            </form>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        const token = localStorage.getItem('token');
        if (token) return window.location.href = '/products';

        $("#loginForm").submit(function (e){
            e.preventDefault();
            const email = $("#email").val();
            const password = $("#password").val();
            var token =  $('#csrf').attr('value');
            $.ajax({
                url: '/login',
                method : 'post',
                contentType: 'application/json',
                data : JSON.stringify({email, password}),
                headers: {
                    'X-CSRF-Token': token
                },
                success: function (response){
                    $('#loginError').html('');
                    localStorage.setItem('token', response.token.accessToken);
                    window.location.href = '/products'
                },
                error : function (xhr, status, error){
                    var err = JSON.parse(xhr.responseText);
                    $('#loginError').html(err.message);
                }
            });
        });
    });
    </script>
@endsection
