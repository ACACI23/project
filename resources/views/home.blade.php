@extends('layouts.main')

@section('container')
<div class="bg-gray-50 font-sans leading-normal tracking-normal">
    <!-- Container -->
    <div class="container mx-auto p-4">
        <!-- Hero Section -->
        <div class="flex flex-col lg:flex-row items-center justify-between mt-10">
            <div class="max-w-lg text-center lg:text-left">
                <h1 class="text-4xl font-bold mb-4">SupNet: <span class="text-blue-500">Your Trusted Supplier</span></h1>
                <p class="text-gray-600 mb-6">Reliable supply chain solutions tailored for your business needs.</p>
                <button class="px-6 py-3 bg-black text-white font-semibold rounded hover:bg-gray-800">Contact Us Today</button>
            </div>
            <div class="mt-8 lg:mt-0 lg:ml-10 flex items-center space-x-4">
                <div class="flex flex-col space-y-4 bg-yellow-300 p-4 rounded-lg">
                    <button class="p-2 bg-white rounded-full shadow-md">📦</button>
                    <button class="p-2 bg-white rounded-full shadow-md">📈</button>
                    <button class="p-2 bg-white rounded-full shadow-md">💬</button>
                    <button class="p-2 bg-white rounded-full shadow-md">📧</button>
                </div>
            </div>
        </div>

        <!-- Pricing Table -->
        <div class="flex flex-col md:flex-row mt-12">
            <!-- Left Side - Pricing Info -->
            <div class="bg-purple-50 rounded-lg p-8 md:w-1/2 mr-0 md:mr-4 mb-4 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-800">Special Offers</h2>
                <div class="text-6xl font-extrabold text-gray-800 mt-4">35<span class="text-purple-500 text-4xl">%</span> <span class="text-purple-500">Off</span></div>
                <ul class="mt-6 space-y-2 text-gray-600">
                    <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> Discount on bulk orders</li>
                    <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> Weekly stock updates</li>
                    <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> Priority shipping for members</li>
                </ul>
                <div class="mt-8">
                    <p class="text-gray-600 mb-4">Call us at <span class="font-bold">+1 000 000</span> or</p>
                    <button class="w-full bg-blue-500 text-white font-semibold py-3 rounded-md hover:bg-blue-600 !important">Email Us Now</button>
                </div>
                
                
            </div>

            <!-- Right Side - Features and Companies -->
            <div class="bg-white rounded-lg p-8 md:w-1/2">
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> Access to top suppliers</li>
                    <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> Real-time inventory tracking</li>
                    <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> Flexible payment options</li>
                    <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> Dedicated customer support</li>
                </ul>
                <p class="text-gray-600 mt-8">Whether you're a startup or an established enterprise, SupNet has the resources to keep your supply chain running smoothly. Trusted by leading companies worldwide:</p>
            </div>
        </div>
    </div>
</div>
@endsection
