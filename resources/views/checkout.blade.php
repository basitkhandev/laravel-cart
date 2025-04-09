@extends('layouts.app')
@section('content')

<h3>Checkout Form</h3>

<form id="checkoutForm">
    <span>Your Cart</span>

    <table border="1" cellpadding="10" cellspacing="0" class="table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Price (each)</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody id="cartTableBody">
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
            <td><strong id="totalAmount">0</strong></td>
        </tr>
        </tfoot>
    </table>

    <label>Name:
        <input type="text" name="name" class="input" required>
    </label>
    <label>Phone:
        <input type="text" name="phone" class="input" required>
    </label>
    <label class="label">Address:
        <input type="text" name="address" class="input" required>
    </label>

    <button type="submit" class="btn btn-success">Place Order</button>
</form>

<div id="message" style="color: green;"></div>
<div id="errors" style="color: red;"></div>
@vite('resources/js/checkout.js')
@endsection
