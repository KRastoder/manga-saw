<?php

namespace App\Http\Controllers;

use App\Repositories\MangaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MangaController extends Controller
{
    private $mangaRepo ;
    public function __construct(){
        $this->mangaRepo = new MangaRepository();
    }
    public function index(){
        Cache::forget('latest_five_mangas');
    $latestMangas = Cache::remember('latest_five_mangas', 3600, fn() => $this->mangaRepo->latestFive());
        return view('welcome',[
            'latestMangas' =>  $latestMangas,
        ]);
    }
}
