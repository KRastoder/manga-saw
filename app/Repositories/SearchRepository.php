<?php
namespace App\Repositories;

use App\Models\Mangas;

class SearchRepository
{
    private $mangaModel;

    public function __construct()
    {
        $this->mangaModel = new Mangas();
    }

    public function search($search)
    {
        $searchResult = $this->mangaModel
            ->where('name', 'LIKE', '%' . $search . '%')
            ->limit(100)
            ->get();

        return $searchResult;
    }

    public function all()
    {
         return $this->mangaModel->limit(100)->get();
    }

    public function latest()
    {
        return $this->mangaModel->latest('release_date')->limit(100)->get();
    }

    public function longest()
    {
         return $this->mangaModel->latest('chapters')->limit(100)->get();
    }

    public function leastExpensive()
    {
        return $this->mangaModel->orderBy('price', 'asc')->limit(100)->get();

    }
    
    //TODO ADD RECOMMENDATIONS
    
}
