@extends('layouts.mainLayout')

@section('title')
    Mangasaw
@endsection

@section('content')
    {{-- ================= HERO / TOP SECTION ================= --}}
    <div class="w-full max-w-7xl mx-auto px-6 py-16 relative bg-[#F4F2EE]">

        <div class="relative">

            @foreach ($latestMangas as $index => $manga)
                <input type="radio" name="carousel" id="slide-{{ $index }}" class="hidden"
                    {{ $index === 0 ? 'checked' : '' }}>
            @endforeach

            <div class="relative h-[540px]">
                @foreach ($latestMangas as $index => $manga)
                    <div class="absolute inset-0 transition-opacity duration-500 opacity-0 flex items-center gap-16"
                        id="slide-content-{{ $index }}">

                        <!-- LEFT -->
                        <div class="w-[60%]">
                            <h1 class="text-7xl md:text-8xl font-bold font-serif text-black mb-6">
                                {{ $manga->name }}
                            </h1>

                            <p class="text-lg text-gray-700 mb-10 line-clamp-5">
                                {{ $manga->description }}
                            </p>

                            <div class="flex items-center gap-6 mb-6">
                                <span class="text-3xl font-bold text-black">
                                    ${{ $manga->price }}
                                </span>

                                <a href="#"
                                    class="px-8 py-4 bg-white text-black font-semibold hover:bg-gray-100 transition shadow-sm">
                                    Buy Now
                                </a>
                            </div>

                            <div class="flex gap-4">
                                <label for="slide-{{ ($index - 1 + count($latestMangas)) % count($latestMangas) }}"
                                    class="cursor-pointer px-6 py-3 bg-white border hover:bg-gray-100 transition">
                                    ‹ Prev
                                </label>

                                <label for="slide-{{ ($index + 1) % count($latestMangas) }}"
                                    class="cursor-pointer px-6 py-3 bg-white border hover:bg-gray-100 transition">
                                    Next ›
                                </label>
                            </div>
                        </div>

                        <!-- RIGHT -->
                        <div class="w-[40%] flex justify-end">
                            <img src="{{ asset('storage/' . $manga->cover_path) }}" alt="{{ $manga->name }}"
                                class="w-full h-[540px] object-contain shadow-[0_4px_10px_#EEEBE5]">
                        </div>

                    </div>
                @endforeach
            </div>

            <style>
                @foreach ($latestMangas as $index => $manga)
                    #slide-{{ $index }}:checked~div #slide-content-{{ $index }} {
                        opacity: 1;
                        z-index: 10;
                    }
                @endforeach
            </style>

        </div>
    </div>

    {{-- ================= FEATURED MANGAS / BOTTOM ================= --}}
    <div class="w-full bg-[#F4F2EE] mt-32 py-20">
        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-6xl font-bold font-serif text-black text-center mb-20">
                Featured Mangas
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-10">

                @foreach ($latestMangas as $manga)
                    <a href="#" class="group relative block">

                        <img src="{{ asset('storage/' . $manga->cover_path) }}" alt="{{ $manga->name }}"
                            class="w-full h-[340px] object-contain shadow-[0_4px_10px_#EEEBE5]">

                        <div
                            class="absolute left-0 right-0 bottom-5 h-[25%] bg-[#101211] flex items-center justify-center
                            opacity-0 group-hover:opacity-100 transition">
                            <span class="text-white text-lg font-semibold">
                                Add to Cart
                            </span>
                        </div>

                    </a>
                @endforeach

            </div>

        </div>
    </div>
        <div class="w-full bg-[#F4F2EE] mt-32 py-20">
        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-6xl font-bold font-serif text-black text-center mb-20">
                :atest
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-10">

                @foreach ($latestMangas as $manga)
                    <a href="#" class="group relative block">

                        <img src="{{ asset('storage/' . $manga->cover_path) }}" alt="{{ $manga->name }}"
                            class="w-full h-[340px] object-contain shadow-[0_4px_10px_#EEEBE5]">

                        <div
                            class="absolute left-0 right-0 bottom-5 h-[25%] bg-[#101211] flex items-center justify-center
                            opacity-0 group-hover:opacity-100 transition">
                            <span class="text-white text-lg font-semibold">
                                Add to Cart
                            </span>
                        </div>

                    </a>
                @endforeach

            </div>

        </div>
    </div>

    {{-- ================= BRANDS STRIP ================= --}}
    <div class="w-full py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-20 text-center">

                <!-- Brand 1 -->
                <div class="flex flex-col items-center gap-6 text-[#959189]">
                    <div
                        class="w-24 h-16 flex items-center justify-center
                            text-4xl font-serif tracking-[0.35em] border-b border-[#959189]">
                        IS
                    </div>
                    <span class="text-xs tracking-[0.3em] uppercase">
                        InkScroll
                    </span>
                </div>

                <!-- Brand 2 -->
                <div class="flex flex-col items-center gap-6 text-[#959189]">
                    <div
                        class="w-24 h-16 flex items-center justify-center
                            text-4xl font-bold italic tracking-widest">
                        BP
                    </div>
                    <span class="text-xs tracking-[0.3em] uppercase">
                        BladePanel
                    </span>
                </div>

                <!-- Brand 3 -->
                <div class="flex flex-col items-center gap-6 text-[#959189]">
                    <div
                        class="w-24 h-16 flex items-center justify-center
                            text-4xl font-light tracking-[0.4em]">
                        ML
                    </div>
                    <span class="text-xs tracking-[0.3em] uppercase">
                        MonoLine
                    </span>
                </div>

                <!-- Brand 4 -->
                <div class="flex flex-col items-center gap-6 text-[#959189]">
                    <div
                        class="w-24 h-16 flex items-center justify-center
                            text-4xl font-serif italic tracking-[0.25em]">
                        NF
                    </div>
                    <span class="text-xs tracking-[0.3em] uppercase">
                        NightFrame
                    </span>
                </div>

                <!-- Brand 5 -->
                <div class="flex flex-col items-center gap-6 text-[#959189]">
                    <div
                        class="w-24 h-16 flex items-center justify-center
                            text-4xl font-extrabold tracking-[0.2em]">
                        FT
                    </div>
                    <span class="text-xs tracking-[0.3em] uppercase">
                        FlashTone
                    </span>
                </div>

            </div>
        </div>
    </div>
@endsection
