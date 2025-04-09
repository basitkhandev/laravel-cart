@extends('layouts.app')
@section('content')
    <div class="Login" id="Login">
        <div class="container" >
            <a href="{{route('my.orders')}}" class="btn btn-primary" style="float:right;margin:20px">View My Orders</a>
            <h4>Products</h4>
            <div id="product_listing">

            </div>
            <h4 style="margin-top:40px">Cart</h4>

            <table class="table" style="width: 20%;">
                <tbody id="cartList">

                </tbody>
            </table>
            <button id="checkoutBtn" class="btn btn-primary" style="float: right">Checkout</button>


            <div id="message" style="color: green;"></div>
            <div id="errors" style="color: red;"></div>
        </div>
    </div>
    @vite('resources/js/products.js')
@endsection

