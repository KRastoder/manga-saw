@extends('layouts.mainLayout')
@section('title')
    {{ $manga->name }}
@endsection
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {{-- Left Side - Chapter List --}}
            <div class="lg:col-span-3">
                <div class="border border-gray-200 rounded-lg h-[800px] flex flex-col">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Chapters</h2>
                    </div>
                    <div class="overflow-y-auto flex-1 p-6">
                        <div class="space-y-3">
                            @for ($i = 1; $i <= $manga->chapters; $i++)
                                <div class="group relative">
                                    <a href="" 
                                       class="block px-4 py-3 border border-gray-200 rounded hover:border-gray-900 transition-all duration-200">
                                        <span class="text-gray-700 group-hover:text-gray-900">Chapter {{ $i }}</span>
                                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Add to cart
                                        </span>
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            {{-- Right Side - Manga Details --}}
            <div class="lg:col-span-1">
                <div class="border border-gray-200 rounded-lg overflow-hidden h-[800px]">
                    {{-- Cover Image --}}
                    <div class="h-[450px]">
                        <img src="{{ asset('storage/' . $manga->cover_path) }}" 
                             alt="{{ $manga->name }}"
                             class="w-full h-full ">
                    </div>
                    {{-- Details Section Below Image --}}
                    <div class="p-8">
                        <h1 class="text-3xl font-semibold text-gray-900 mb-2">{{ $manga->name }}</h1>
                        <p class="text-gray-600 mb-6">by {{ $manga->author_name }}</p>
                        <div class="mb-6">
                            <p class="text-2xl font-medium text-gray-900">${{ number_format($manga->price, 2) }}</p>
                        </div>
                        <div class="mb-6">
                            <h2 class="text-lg font-medium text-gray-900 mb-3">Description</h2>
                            <div class="max-h-32 overflow-y-auto">
                                <p class="text-gray-700 leading-relaxed">{{ $manga->description }}</p>
                            </div>
                        </div>
                        <div class="flex gap-8 text-sm border-t border-gray-200 pt-6">
                            <div>
                                <span class="text-gray-500">Author</span>
                                <p class="text-gray-900 font-medium mt-1">{{ $manga->author_name }}</p>
                            </div>
                            <div>
                                <span class="text-gray-500">Chapters</span>
                                <p class="text-gray-900 font-medium mt-1">{{ $manga->chapters }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection