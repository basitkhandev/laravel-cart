<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::post('/login', function(Request $request){
    if(!Auth::attempt($request->only('email','password'))){
        return response()->json(['message' => 'Invalid Crediantials'], 401);
    }
    $user = Auth::user();
    $token = $user->createToken('apiToken');
    return response()->json(['token' => $token], 200);
});
Route::get('/', function () {
    return view('login');
});

Route::get('/products', function () {
    return view('products');
})->name('products.list');

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/my-orders', function () {
    return view('my-orders');
})->name('my.orders');
