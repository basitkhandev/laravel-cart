@extends('layouts.app')
@section('content')
    <div class="Login" id="Login">
        <div class="container">
            <a href="{{route('my.orders')}}" class="btn btn-primary" style="float:right">View My Orders</a>
            <h1>Products</h1>
            <div id="product_listing">

            </div>
            <h3>Cart</h3>

            <ul id="cartList"></ul>
            <button id="checkoutBtn" class="btn btn-primary" style="float: right">Checkout</button>


            <div id="message" style="color: green;"></div>
            <div id="errors" style="color: red;"></div>
        </div>
    </div>
    @vite('resources/js/products.js')
@endsection

