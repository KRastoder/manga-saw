<?php

namespace App\Repositories;

use App\Models\Mangas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MangaRepository
{
    protected $mangaModel;

    public function __construct()
    {
        $this->mangaModel = new Mangas();
    }

public function create(Request $request)
{
    $validatedData = $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'required|string',
        'author_name' => 'required|string|max:255',
        'status'      => 'required|in:ongoing,completed,hiatus',
        'chapters'    => 'required|integer|min:0',
        'price'       => 'required|numeric|min:0',
        'cover_path'  => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
    ]);

    // Step 1: Create manga record with temporary cover_path
    $manga = $this->mangaModel->create([
        'name'        => $validatedData['name'],
        'description' => $validatedData['description'],
        'author_name' => $validatedData['author_name'],
        'status'      => $validatedData['status'],
        'chapters'    => $validatedData['chapters'],
        'price'       => $validatedData['price'],
        'release_date'=> $request->release_date,
        'cover_path'  => 'temp', // placeholder
    ]);

    // Step 2: Store uploaded image with manga ID as filename
    $file      = $request->file('cover_path');
    $extension = $file->getClientOriginalExtension();
    $fileName  = $manga->id . '.' . $extension;

    $path = $file->storeAs('covers', $fileName, 'public');

    // Step 3: Update manga record with real cover path
    $manga->cover_path = $path;
    $manga->save();

    return $manga;
}

}
