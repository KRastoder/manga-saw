@extends('layouts.mainLayout')

@section('title')
    Mangasaw Shop
@endsection

@section('content')
    {{-- Search Bar Section --}}
    <div class="w-full py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-center mb-8">
                <div class="relative w-full max-w-lg">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" placeholder="Search manga..." name="search"
                            class="w-full rounded-full border-2 border-gray-200 px-6 py-3 pr-32 text-sm focus:outlie-none focus:border-[#776E51] transition-colors shadow-sm">
                        <button
                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-[#776E51] to-[#8a7f5e] text-white px-6 py-2 text-sm font-medium rounded-full">
                            Search
                        </button>
                    </form>
                </div>
            </div>

            {{-- Filter Buttons --}}
            <div class="flex flex-wrap justify-center gap-2 mb-6">
                <a class="px-5 py-2 text-sm font-medium rounded-full  text-gray-700 shadow-sm" href="{{ route('shop.all') }}"> 
                    All
                </a>
                <a class="px-5 py-2 text-sm font-medium rounded-full border-2 border-gray-200 text-gray-700" href="{{ route('shop.latest') }}">
                    Latest
                </a>
                <button class="px-5 py-2 text-sm font-medium rounded-full border-2 border-gray-200 text-gray-700">
                    Recommendations
                </button>
                <a class="px-5 py-2 text-sm font-medium rounded-full border-2 border-gray-200 text-gray-700" href="{{ route('shop.longest') }}">
                    Longest
                </a>
                <a class="px-5 py-2 text-sm font-medium rounded-full border-2 border-gray-200 text-gray-700" href="{{ route('shop.leastexpencive') }}">
                    Least Expencive
                </a>
            </div>
        </div>
    </div>

    {{-- Manga Grid --}}
    <div class="w-full pb-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-5">

                @foreach ($latestMangas as $manga)
                    <article
                        class="group flex flex-col rounded-xl overflow-hidden border-2 border-stone-200 shadow-sm cursor-pointer
                        transition-all duration-100 ease-out
                        hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.45)]">

                        <a href="#" class="block h-full">

                            {{-- Cover Image --}}
                            <div class="relative w-full overflow-hidden" style="height: 260px;">
                                <img src="{{ asset('storage/' . $manga->cover_path) }}" alt="{{ $manga->name }}"
                                    class="w-full h-full  transition-transform duration-300 group-hover:scale-110">

                                {{-- Hover Overlay --}}
                                <div
                                    class="absolute inset-0 bg-black/0 transition-colors duration-300 group-hover:bg-black/20">
                                </div>

                                {{-- Corner Accent --}}
                                <div
                                    class="absolute top-0 right-0 w-12 h-12 bg-gradient-to-bl from-[#776E51]/20 to-transparent">
                                </div>
                            </div>

                            {{-- Content Section --}}
                            <div class="p-3 space-y-1.5 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xs font-bold text-gray-900 line-clamp-2 leading-snug min-h-[2rem]">
                                        {{ $manga->name }}
                                    </h3>

                                    <p class="text-[11px] text-gray-500 truncate font-medium">
                                        {{ $manga->author_name }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between pt-1">
                                    <p class="text-base font-bold text-[#776E51]">
                                        ${{ number_format($manga->price, 2) }}
                                    </p>

                                    <p class="text-[10px] text-gray-400 font-light tracking-wide">
                                        @if (\Carbon\Carbon::parse($manga->release_date)->month >= 3 && \Carbon\Carbon::parse($manga->release_date)->month <= 5)
                                            Spring {{ \Carbon\Carbon::parse($manga->release_date)->year }}
                                        @elseif(\Carbon\Carbon::parse($manga->release_date)->month >= 6 && \Carbon\Carbon::parse($manga->release_date)->month <= 8)
                                            Summer {{ \Carbon\Carbon::parse($manga->release_date)->year }}
                                        @elseif(\Carbon\Carbon::parse($manga->release_date)->month >= 9 && \Carbon\Carbon::parse($manga->release_date)->month <= 11)
                                            Fall {{ \Carbon\Carbon::parse($manga->release_date)->year }}
                                        @else
                                            Winter {{ \Carbon\Carbon::parse($manga->release_date)->year }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            {{-- Bottom Hover Accent --}}
                            <div class="h-1 bg-transparent transition-colors duration-300 group-hover:bg-[#776E51]"></div>

                        </a>
                    </article>
                @endforeach

            </div>
        </div>
    </div>
@endsection
