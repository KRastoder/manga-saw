@extends('layouts.mainLayout')
@section('title', 'Checkout')
@section('content')
    <div class="py-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Checkout</h1>
        @if (cartCount() === 0)
            <div class="text-center py-20 bg-white rounded-lg shadow">
                <p class="text-gray-500 text-xl mb-6">Your cart is empty. Add some manga chapters first!</p>
                <a href="/shop"
                    class="inline-block px-8 py-3 bg-gray-900 text-white rounded hover:bg-gray-800 transition font-semibold">
                    Go to Shop
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Left Side - Checkout Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow p-8">
                        <form action="/finalize-order" method="POST">
                            @csrf
                            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Billing Information</h2>

                            <div class="space-y-6">
                                {{-- Full Name --}}
                                <div>
                                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Full
                                        Name</label>
                                    <input type="text" id="full_name" name="full_name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                        placeholder="John Doe" required>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email
                                        Address</label>
                                    <input type="email" id="email" name="email"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                        placeholder="john@example.com" required>
                                </div>

                                {{-- Phone --}}
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone
                                        Number</label>
                                    <input type="tel" id="phone" name="phone"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                        placeholder="+1 (555) 123-4567" required>
                                </div>

                                {{-- Address --}}
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Street
                                        Address</label>
                                    <input type="text" id="address" name="address"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                        placeholder="123 Main Street" required>
                                </div>

                                {{-- City, State, Zip --}}
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label for="city"
                                            class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                        <input type="text" id="city" name="city"
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                            placeholder="New York" required>
                                    </div>
                                    <div>
                                        <label for="zip" class="block text-sm font-medium text-gray-700 mb-2">Zip
                                            Code</label>
                                        <input type="text" id="zip" name="zip"
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                            placeholder="10001" required>
                                    </div>
                                </div>

                                {{-- Country --}}
                                <div>
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                                    <select id="country" name="country"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                        required>
                                        <option value="">Select Country</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="AU">Australia</option>
                                        <option value="JP">Japan</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <hr class="my-8">

                                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Payment Information</h2>

                                {{-- Card Number --}}
                                <div>
                                    <label for="card_number" class="block text-sm font-medium text-gray-700 mb-2">Card
                                        Number</label>
                                    <input type="text" id="card_number" name="card_number"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                        placeholder="1234 5678 9012 3456" maxlength="19" required>
                                </div>

                                {{-- Card Details --}}
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="expiry" class="block text-sm font-medium text-gray-700 mb-2">Expiry
                                            Date</label>
                                        <input type="text" id="expiry" name="expiry"
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                            placeholder="MM/YY" maxlength="5" required>
                                    </div>
                                    <div>
                                        <label for="cvv"
                                            class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                                        <input type="text" id="cvv" name="cvv"
                                            class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                            placeholder="123" maxlength="4" required>
                                    </div>
                                </div>

                                {{-- Card Holder Name --}}
                                <div>
                                    <label for="card_name" class="block text-sm font-medium text-gray-700 mb-2">Cardholder
                                        Name</label>
                                    <input type="text" id="card_name" name="card_name"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                        placeholder="John Doe" required>
                                </div>
                            </div>
                    </div>
                </div>

                {{-- Right Side - Order Summary --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Summary</h2>

                        <div class="space-y-3 mb-6">
                            @foreach (cartItems() as $item)
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">{{ $item['name'] }} - Ch. {{ $item['chapter'] }}
                                        (x{{ $item['quantity'] }})
                                    </span>
                                    <span
                                        class="text-gray-900 font-medium">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <hr class="my-4">

                        <div class="space-y-2 mb-6">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="text-gray-900">${{ number_format(cartTotal(), 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Tax</span>
                                <span class="text-gray-900">${{ number_format(cartTotal() * 0.1, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Shipping</span>
                                <span class="text-gray-900">Free</span>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="flex justify-between text-lg font-semibold mb-6">
                            <span>Total</span>
                            <span>${{ number_format(cartTotal() * 1.1, 2) }}</span>
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-gray-900 text-white rounded hover:bg-gray-800 transition font-semibold">
                            Place Order
                        </button>

                        <a href="{{ route('cart') }}"
                            class="block text-center mt-4 text-sm text-gray-600 hover:text-gray-900">
                            ← Back to Cart
                        </a>
                    </div>

                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
