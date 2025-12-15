<?php
namespace App\Http\Controllers;

use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderRepo;
    public function __construct(){
        $this->orderRepo = new OrdersRepository();

    }
    public function create(Request $request)
    {
        // dd(session('cart'));
        $this->orderRepo->create($request);

        return redirect('/');

    }
}
