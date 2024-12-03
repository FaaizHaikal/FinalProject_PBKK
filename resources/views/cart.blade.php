@extends('layouts.basic')

@section('title', 'Shop - Cart')

@section('content')

<div class="relative">
    <header class="antialiased shadow-sm">
        <x-navbar :username="$username" :email="$email" />
    </header>
<div class="container mx-auto my-10">
    <div class="text-2xl font-semibold mb-4 text-red-400 text-center mt-8">Your Shopping Cart </div>

    <!-- Check if cart is empty -->
    @if (empty($cart))
        <p>Your cart is empty.</p>
    @else
        <!-- Cart Table with additional margin and padding -->
        <table class="w-full bg-white border border-gray-300 rounded-lg shadow-lg mt-6 mb-6">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-20 py-3 border-b text-sm font-medium text-gray-700 text-center">Product</th>
                    <th class="px-20 py-3 border-b text-sm font-medium text-gray-700 text-center">Price</th>
                    <th class="px-20 py-3 border-b text-sm font-medium text-gray-700 text-center">Quantity</th>
                    <th class="px-20 py-3 border-b text-sm font-medium text-gray-700 text-center">Total</th>
                    <th class="px-20 py-3 border-b text-sm font-medium text-gray-700 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $productId => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-6 text-sm text-gray-700 text-center">
                            <div class="flex items-center justify-center h-20 w-20 rounded-lg">
                                <img src="data:image/jpeg;base64,{{ $item['image'] }}" alt="{{ $item['name'] }}" class="object-cover rounded-md mr-4 h-20 w-20">
                                <span>{{ $item['name'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-sm text-gray-700 text-center">
                            Rp{{ number_format($item['price'], 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-6 text-sm text-gray-700 text-center">
                            <form class="flex items-center justify-center" action="{{ route('cart.update', $productId) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 p-1 text-center border rounded-md mr-2">
                                <button type="submit" class="text-blue-600 hover:underline">Update</button>
                            </form>
                        </td>
                        <td class="px-6 py-6 text-sm text-gray-700 text-center">
                            Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-6 text-sm text-gray-700 text-center">
                            <form action="{{ route('cart.remove', $productId) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Cart Total with more spacing -->
        <div class="mt-6 text-left">
            @php
                $total = 0;
                foreach ($cart as $item) {
                    $total += $item['price'] * $item['quantity'];
                }
            @endphp
            <p class="text-xl font-bold">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
        </div>

        <!-- Checkout Button with margin -->
        <div class="mt-6 flex justify-start">
            <a class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                Proceed to Checkout
            </a>
        </div>
    @endif
</div>
            </div>
@endsection
