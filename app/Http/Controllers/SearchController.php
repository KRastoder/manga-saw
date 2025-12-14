<?php
namespace App\Http\Controllers;

use App\Repositories\SearchRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $searchRepo;

    public function __construct()
    {
        $this->searchRepo = new SearchRepository();
    }

    public function search(Request $request)
    {

        return view('shop.index', [
            'latestMangas' => $this->searchRepo->search($request->search), // Uvek zovem latest manga da ne bi menjao view
        ]);
    }
    public function all()
    {
        return view('shop.index', [
            'latestMangas' => $this->searchRepo->all(),
        ]);
    }

    public function latest()
    {
        return view('shop.index', [
            'latestMangas' => $this->searchRepo->latest(),
        ]);
    }

    public function longest()
    {
        return view('shop.index', [
            'latestMangas' => $this->searchRepo->longest(),
        ]);
    }

    public function leastExpencive()
    {
        return view('shop.index', [
            'latestMangas' => $this->searchRepo->leastExpensive(),
        ]);
    }

}
