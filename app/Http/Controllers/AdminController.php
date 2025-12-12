<?php
namespace App\Http\Controllers;

use App\Repositories\MangaRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $mangaRepo;
    public function __construct()
    {
        $this->mangaRepo = new MangaRepository();

    }
    public function index()
    {
        return view('admin.adminForm');

    }
    public function storeManga(Request $request)
    {
        $this->mangaRepo->create($request);
        return redirect()->back()->with('success', 'Manga created successfully!');
    }

}
