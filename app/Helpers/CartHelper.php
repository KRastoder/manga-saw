<?php
// File: app/Helpers/CartHelper.php

if (!function_exists('cartCount')) {
    /**
     * Get the total number of items in the cart
     */
    function cartCount()
    {
        return session()->has('cart') ? count(session('cart')) : 0;
    }
}

if (!function_exists('cartItems')) {
    /**
     * Get all cart items as a collection
     */
    function cartItems()
    {
        return collect(session()->get('cart', []));
    }
}

if (!function_exists('cartTotal')) {
    /**
     * Calculate the total price of all items in the cart
     */
    function cartTotal()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return $total;
    }
}
