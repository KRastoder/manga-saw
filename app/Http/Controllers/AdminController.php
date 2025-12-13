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
    public function index(){
        
        return view('admin.admin',[
            'mangas' => $this->mangaRepo->show()
        ]);
    }
    public function create()
    {
        return view('admin.adminForm');

    }
    public function storeManga(Request $request)
    {
        $this->mangaRepo->create($request);
        return redirect()->back()->with('success', 'Manga created successfully!');
    }
    public function delete(Request $request){
        $this->mangaRepo->delete($request);
        return redirect()->back()->with('success', 'Manga deleted successfully!');

    }
    public function edit($id){

        $manga = $this->mangaRepo->find($id);

        return view('admin.editManga', compact('manga'));
    }

    public function update(Request $request){
        $this->mangaRepo->update($request);
        return redirect()->back()->with('success', 'Manga updated successfully!');
    }


}
