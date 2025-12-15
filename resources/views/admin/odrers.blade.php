@extends('layouts.mainLayout')
@section('title', 'Manage Orders')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-stone-100 via-neutral-100 to-stone-200 py-12 px-6 text-zinc-800">
    <div class="max-w-[1400px] mx-auto">

        <!-- Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-10 gap-4">
            <div>
                <h1 class="text-5xl font-extrabold tracking-tight text-zinc-900">Orders Dashboard</h1>
                <p class="text-zinc-500 mt-2">Manage all customer orders efficiently</p>
            </div>
        </div>

        <!-- Orders Table Card -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl shadow-zinc-900/10 ring-1 ring-black/5 overflow-x-auto">
            <table class="w-full min-w-[1100px]">
                <thead class="bg-zinc-100 sticky top-0">
                    <tr class="text-xs uppercase tracking-widest text-zinc-500 border-b border-zinc-300">
                        <th class="px-8 py-4 text-left">Customer</th>
                        <th class="px-8 py-4 text-left">Email</th>
                        <th class="px-8 py-4 text-center">Phone</th>
                        <th class="px-8 py-4 text-center">Country</th>
                        <th class="px-8 py-4 text-left">City</th>
                        <th class="px-8 py-4 text-left">Address</th>
                        <th class="px-8 py-4 text-center">Zip</th>
                        <th class="px-8 py-4 text-center">Total</th>
                        <th class="px-8 py-4 text-center">Status</th>
                        <th class="px-8 py-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-200">
                    @foreach ($orders as $order)
                        <tr class="group hover:bg-stone-50 transition-all duration-300">
                            <td class="px-8 py-6 font-semibold text-zinc-900">{{ $order->customer_name }}</td>
                            
                            <td class="px-8 py-6 text-zinc-700">
                                {{ $order->email }}
                                <input type="hidden" name="email" value="{{ $order->email }}">
                            </td>

                            <td class="px-8 py-6 text-center text-zinc-700">{{ $order->phone_number }}</td>
                            <td class="px-8 py-6 text-center text-zinc-700">{{ $order->country }}</td>
                            <td class="px-8 py-6 text-zinc-700">{{ $order->city }}</td>
                            <td class="px-8 py-6 text-zinc-700">{{ $order->street_adress }}</td>
                            <td class="px-8 py-6 text-center text-zinc-700">{{ $order->zip_code }}</td>
                            <td class="px-8 py-6 text-center font-semibold text-zinc-900">${{ number_format($order->total, 2) }}</td>

                            <td class="px-8 py-6 text-center">
                                <!-- Form moved here -->
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="flex flex-col items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="orderId" value="{{ $order->id }}">
                                    <input type="hidden" name="email" value="{{ $order->email }}">
                                    
                                    <select name="status" 
                                        class="w-full max-w-xs bg-white border border-zinc-300 rounded-xl px-4 py-2
                                               text-sm font-medium text-zinc-800
                                               shadow-sm hover:shadow-md
                                               focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent
                                               transition-all duration-200">
                                        <option value="pending" @if($order->status === 'pending') selected @endif>Pending</option>
                                        <option value="processing" @if($order->status === 'processing') selected @endif>Processing</option>
                                        <option value="shipped" @if($order->status === 'shipped') selected @endif>Shipped</option>
                                        <option value="completed" @if($order->status === 'completed') selected @endif>Completed</option>
                                        <option value="canceled" @if($order->status === 'canceled') selected @endif>Canceled</option>
                                    </select>

                                    <button type="submit"
                                        class="inline-block px-6 py-3 rounded-2xl text-sm font-semibold
                                               bg-sky-500/10 text-sky-700
                                               hover:bg-sky-500 hover:text-white
                                               shadow-sm hover:shadow-lg
                                               transition-all duration-300">
                                        Update
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
