<?php
namespace App\Http\Controllers;

use App\Mail\OrderShippedMail;
use App\Repositories\MangaRepository;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    private $mangaRepo;
    private $ordersRepo;
    public function __construct()
    {
        $this->mangaRepo = new MangaRepository();

    }
    public function index()
    {

        return view('admin.admin', [
            'mangas' => $this->mangaRepo->show(),
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
    public function delete(Request $request)
    {
        $this->mangaRepo->delete($request);
        return redirect()->back()->with('success', 'Manga deleted successfully!');

    }
    public function edit($id)
    {

        $manga = $this->mangaRepo->getMangaById($id);

        return view('admin.editManga', compact('manga'));
    }

    public function update(Request $request)
    {
        $this->mangaRepo->update($request);
        return redirect()->back()->with('success', 'Manga updated successfully!');
    }
    public function ordersPage()
    {

        $this->ordersRepo = new OrdersRepository();

        return view('admin.odrers', [
            'orders' => $this->ordersRepo->show(),

        ]);

    }
    public function updateStatus(Request $request)
    {
        $this->ordersRepo = new OrdersRepository();
        $this->ordersRepo->updateStatus($request);

        Mail::to($request->email)
            ->send(new OrderShippedMail($request->orderId, $request->status));

        return back()->with('success', 'Order status updated and email sent!');
    }

}
