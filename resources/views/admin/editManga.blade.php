@extends('layouts.mainLayout')
@section('title')
    Edit manga
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-stone-100 via-neutral-100 to-stone-200 py-14 px-6">

    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-black text-zinc-900">
                Edit Manga
            </h1>
            <p class="text-zinc-500 mt-2">
                Update details and keep your catalog perfect
            </p>
        </div>

        <!-- Form Card -->
        <form method="POST"
              action="{{ route('admin.manga.update') }}"
              enctype="multipart/form-data"
              class="bg-stone-50/80 backdrop-blur-xl
                     rounded-3xl p-8
                     shadow-xl shadow-zinc-900/10
                     ring-1 ring-black/5 space-y-6">

            @csrf
            <input type="hidden" name="id" value="{{ $manga->id }}">

            <!-- Name -->
            <div>
                <label class="block text-sm font-semibold text-zinc-700 mb-1">
                    Manga Name
                </label>
                <input type="text" name="name"
                       value="{{ $manga->name }}"
                       class="w-full rounded-xl border-zinc-300
                              focus:ring-zinc-900 focus:border-zinc-900">
            </div>

            <!-- Author -->
            <div>
                <label class="block text-sm font-semibold text-zinc-700 mb-1">
                    Author
                </label>
                <input type="text" name="author_name"
                       value="{{ $manga->author_name }}"
                       class="w-full rounded-xl border-zinc-300
                              focus:ring-zinc-900 focus:border-zinc-900">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-semibold text-zinc-700 mb-1">
                    Description
                </label>
                <textarea name="description" rows="4"
                          class="w-full rounded-xl border-zinc-300
                                 focus:ring-zinc-900 focus:border-zinc-900">{{ $manga->description }}</textarea>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1">
                        Status
                    </label>
                    <select name="status"
                            class="w-full rounded-xl border-zinc-300">
                        <option value="ongoing" @selected($manga->status === 'ongoing')>Ongoing</option>
                        <option value="completed" @selected($manga->status === 'completed')>Completed</option>
                        <option value="hiatus" @selected($manga->status === 'hiatus')>Hiatus</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1">
                        Chapters
                    </label>
                    <input type="number" name="chapters"
                           value="{{ $manga->chapters }}"
                           class="w-full rounded-xl border-zinc-300">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1">
                        Price
                    </label>
                    <input type="number" step="0.01" name="price"
                           value="{{ $manga->price }}"
                           class="w-full rounded-xl border-zinc-300">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1">
                        Release Date
                    </label>
                    <input type="date" name="release_date"
                           value="{{ $manga->release_date }}"
                           class="w-full rounded-xl border-zinc-300">
                </div>
            </div>

            <!-- Cover -->
            <div>
                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Cover Image
                </label>

                <div class="flex items-center gap-6">
                    <img src="{{ asset('storage/'.$manga->cover_path) }}"
                         class="w-24 h-36 object-cover rounded-xl shadow-md">

                    <input type="file" name="cover_path"
                           class="block w-full text-sm text-zinc-600">
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3 pt-6">
                <a href="{{ route('admin.dashboard') }}"
                   class="px-6 py-3 rounded-xl font-semibold
                          bg-zinc-200 hover:bg-zinc-300 transition">
                    Cancel
                </a>

                <button
                    class="px-8 py-3 rounded-xl font-semibold
                           bg-zinc-900 text-stone-100
                           hover:-translate-y-0.5 hover:shadow-lg
                           transition-all">
                    Save Changes
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
