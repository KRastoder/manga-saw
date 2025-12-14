@extends('layouts.mainLayout')
@section('title', 'My Cart')
@section('content')
    <div class="py-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">My Cart</h1>
        
        @if(cartCount() === 0)
            <div class="text-center py-20 bg-white rounded-lg shadow">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-gray-500 text-xl mb-6">Your cart is empty</p>
                <a href="/shop" class="inline-block px-8 py-3 bg-gray-900 text-white rounded hover:bg-gray-800 transition font-semibold">
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Manga</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Chapter</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900">Quantity</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Price</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Total</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach(cartItems() as $key => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $item['name'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Chapter {{ $item['chapter'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 text-center">{{ $item['quantity'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 text-right">${{ number_format($item['price'], 2) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 font-medium text-right">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('removeFromCart', $key) }}" 
                                       class="text-red-600 hover:text-red-800 font-semibold text-sm"
                                       onclick="return confirm('Are you sure you want to remove this item?')">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-50 border-t-2 border-gray-300">
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-right text-lg font-semibold text-gray-900">Total:</td>
                            <td class="px-6 py-4 text-right text-lg font-bold text-gray-900">${{ number_format(cartTotal(), 2) }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="mt-8 flex justify-between items-center">
                <a href="/shop" class="px-6 py-3 border-2 border-gray-900 text-gray-900 rounded hover:bg-gray-900 hover:text-white transition font-semibold">
                    Continue Shopping
                </a>
                <a href="{{ route('checkout') }}" class="px-8 py-3 bg-gray-900 text-white rounded hover:bg-gray-800 transition font-semibold">
                    Proceed to Checkout
                </a>
            </div>
        @endif
    </div>
@endsection