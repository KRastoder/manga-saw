<?php
namespace App\Http\Controllers;

use App\Repositories\MangaRepository;

class CartController extends Controller
{
    private $mangaRepo;

    public function __construct()
    {
        $this->mangaRepo = new MangaRepository();
    }
    public function index()
    {
        return view('cart.cart');
    }

    public function removeFromCart($key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Item removed from cart!');
        }

        return redirect()->back()->with('error', 'Item not found!');
    }

    public function checkout()
    {
        return view('cart.checkout');
    }

    public function addToCart($id, $chapter, $quantity = 1)
    {
        $manga = $this->mangaRepo->getMangaById($id);

        if (! $manga) {
            return redirect()->back()->with('error', 'Manga not found!');
        }

        $cart = session()->get('cart', []);

        $cartKey = $id . '_' . $chapter;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                "name"     => $manga->name,
                'manga_id' => $manga->id,
                'chapter'  => $chapter,
                "quantity" => $quantity,
                "price"    => $manga->price,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Chapter added to cart successfully!');
    }
}
