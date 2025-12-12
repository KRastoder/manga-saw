@extends('layouts.mainLayout')
@section('title')
    Admin panel
@endsection
@section('content')
<div class="p-10 bg-gray-50 min-h-screen">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">➕ Create New Manga</h1>
    
    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg max-w-xl m-auto">
            ✓ {{ session('success') }}
        </div>
    @endif
    
    <div class="bg-white shadow-md rounded-2xl p-8 max-w-xl m-auto">
        <form action="{{ route('admin.manga.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf
            
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Name</label>
                <input name="name" 
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                       value="{{ old('name') }}"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Description -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description"
                          class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                          rows="4"
                          required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Author Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Author Name</label>
                <input name="author_name"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('author_name') border-red-500 @enderror"
                       value="{{ old('author_name') }}"
                       required>
                @error('author_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Status -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Status</label>
                <select name="status"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
                        required>
                    <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="hiatus" {{ old('status') == 'hiatus' ? 'selected' : '' }}>Hiatus</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Chapters -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Chapters</label>
                <input name="chapters"
                       type="number"
                       min="0"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('chapters') border-red-500 @enderror"
                       value="{{ old('chapters') }}"
                       required>
                @error('chapters')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Price -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Price ($)</label>
                <input name="price"
                       type="number"
                       step="0.01"
                       min="0"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price') border-red-500 @enderror"
                       value="{{ old('price') }}"
                       required>
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Cover Image -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Cover Image</label>
                <input name="cover_path"
                       type="file"
                       accept="image/jpeg,image/png,image/jpg,image/gif"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('cover_path') border-red-500 @enderror"
                       required>
                <p class="text-gray-500 text-sm mt-1">Max size: 10MB. Formats: JPEG, PNG, JPG, GIF</p>
                @error('cover_path')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Buttons -->
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Create Manga
                </button>
            </div>
        </form>
    </div>
</div>
@endsection