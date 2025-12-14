<?php
namespace App\Repositories;

use App\Models\Mangas;
use Illuminate\Http\Request;

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

        $manga = $this->mangaModel->create([
            'name'         => $validatedData['name'],
            'description'  => $validatedData['description'],
            'author_name'  => $validatedData['author_name'],
            'status'       => $validatedData['status'],
            'chapters'     => $validatedData['chapters'],
            'price'        => $validatedData['price'],
            'release_date' => $request->release_date,
            'cover_path'   => 'temp', // placeholder
        ]);

        $file      = $request->file('cover_path');
        $extension = $file->getClientOriginalExtension();
        $fileName  = $manga->id . '.' . $extension;

        $path = $file->storeAs('covers', $fileName, 'public');

        $manga->cover_path = $path;
        $manga->save();

        return $manga;
    }
    public function delete($request)
    {
        $this->mangaModel->where('id', $request->id)->delete();

    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id'           => 'required|exists:mangas,id',
            'name'         => 'required|string|max:255',
            'description'  => 'required|string',
            'author_name'  => 'required|string|max:255',
            'status'       => 'required|in:ongoing,completed,hiatus',
            'chapters'     => 'required|integer|min:0',
            'price'        => 'required|numeric|min:0',
            'release_date' => 'nullable|date',
            'cover_path'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $manga = $this->mangaModel->findOrFail($validatedData['id']);

        // Update basic fields
        $manga->update([
            'name'         => $validatedData['name'],
            'description'  => $validatedData['description'],
            'author_name'  => $validatedData['author_name'],
            'status'       => $validatedData['status'],
            'chapters'     => $validatedData['chapters'],
            'price'        => $validatedData['price'],
            'release_date' => $validatedData['release_date'] ?? $manga->release_date,
        ]);

        // Handle cover image update (optional)
        if ($request->hasFile('cover_path')) {

            // Delete old cover if exists
            if ($manga->cover_path && \Storage::disk('public')->exists($manga->cover_path)) {
                \Storage::disk('public')->delete($manga->cover_path);
            }

            $file      = $request->file('cover_path');
            $extension = $file->getClientOriginalExtension();
            $fileName  = $manga->id . '.' . $extension;

            $path = $file->storeAs('covers', $fileName, 'public');

            $manga->cover_path = $path;
            $manga->save();
        }
        return $manga;
    }
    public function show(){ //Ako bude imalo previse mangi refactuj kasnije TODO
        return $this->mangaModel->get();
    }
    public function find($id){
        return $this->mangaModel->where('id',$id)->first();

    }
    public function latestFive(){
        return $this->mangaModel->orderBy('release_date')->take(5)->get();
    }
    public function longest(){
        return $this->mangaModel->orderBy('chapters')->take('10')->get();
    }
    

}
