@extends('layouts.app')
@section('content')
<style>

    table { width: 100%; border-collapse: collapse; margin-bottom: 40px; }
    th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
    th { background: #f5f5f5; }
    h3 { margin-top: 40px; }
</style>
<a href="{{route('products.list')}}" class="btn btn-success" style="float:right;margin:20px">Products</a>
<h4>Order History</h4>
<div id="ordersContainer"></div>

<div id="message" style="color: green;"></div>
<div id="errors" style="color: red;"></div>

@vite('resources/js/orders.js')
@endsection
