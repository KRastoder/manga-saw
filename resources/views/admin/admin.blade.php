@extends('layouts.mainLayout')
@section('title')
    Admin main
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-stone-100 via-neutral-100 to-stone-200 py-12 px-6 text-zinc-800">

        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h1 class="text-5xl font-black tracking-tight text-zinc-900">
                        Manga Dashboard
                    </h1>
                    <p class="text-zinc-500 mt-2">
                        Manage your collection like a publisher
                    </p>
                </div>

                <a href="{{ route('admin.manga.create') }}"
                    class="inline-flex items-center gap-2 px-7 py-3 rounded-2xl
                      bg-zinc-900 text-stone-100 font-semibold
                      shadow-lg shadow-zinc-900/20
                      hover:shadow-xl hover:-translate-y-0.5
                      transition-all duration-300">
                    <span class="text-lg">＋</span>
                    Add Manga
                </a>
            </div>

            <!-- Card -->
            <div
                class="bg-stone-50/80 backdrop-blur-xl rounded-3xl
                    shadow-xl shadow-zinc-900/10
                    ring-1 ring-black/5 overflow-hidden">

                <table class="w-full">
                    <thead>
                        <tr
                            class="text-xs uppercase tracking-widest text-zinc-500
                               border-b border-zinc-200">
                            <th class="px-6 py-5 text-left">Cover</th>
                            <th class="px-6 py-5 text-left">Title</th>
                            <th class="px-6 py-5 text-center">Status</th>
                            <th class="px-6 py-5 text-center">Chapters</th>
                            <th class="px-6 py-5 text-center">Price</th>
                            <th class="px-6 py-5 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-zinc-200">
                        @foreach ($mangas as $manga)
                            <tr class="group hover:bg-stone-100/70 transition">

                                <!-- Cover -->
                                <td class="px-6 py-5">
                                    <img src="{{ asset('storage/' . $manga->cover_path) }}"
                                        class="w-14 h-20 object-cover rounded-xl
                                        shadow-md shadow-zinc-900/20
                                        group-hover:scale-105 transition">
                                </td>

                                <!-- Title -->
                                <td class="px-6 py-5">
                                    <div class="font-semibold text-lg text-zinc-900">
                                        {{ $manga->name }}
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-5 text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full
                                         text-xs font-semibold
                                @if ($manga->status === 'ongoing') bg-emerald-100 text-emerald-700
                                @elseif ($manga->status === 'completed')
                                    bg-sky-100 text-sky-700
                                @else
                                    bg-rose-100 text-rose-700 @endif">
                                        {{ ucfirst($manga->status) }}
                                    </span>
                                </td>

                                <!-- Chapters -->
                                <td class="px-6 py-5 text-center font-medium">
                                    {{ $manga->chapters }}
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-5 text-center font-semibold">
                                    ${{ number_format($manga->price, 2) }}
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-5 text-center flex items-center justify-center gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('admin.manga.edit', $manga->id) }}"
                                        class="px-4 py-2 rounded-xl text-sm font-semibold
                                      bg-sky-500/10 text-sky-700
                                      hover:bg-sky-500 hover:text-white
                                      transition-all">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <form method="POST" action="{{ route('admin.manga.delete') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $manga->id }}">
                                        <button
                                            class="px-4 py-2 rounded-xl text-sm font-semibold
                                           bg-rose-500/10 text-rose-600
                                           hover:bg-rose-500 hover:text-white
                                           transition-all">
                                            Delete
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
