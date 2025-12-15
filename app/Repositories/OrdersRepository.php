<?php
namespace App\Repositories;

use App\Models\OrderItem;
use App\Models\Orders;

class OrdersRepository
{
    private $ordersModel, $orderItemModel;

    public function __construct()
    {
        $this->ordersModel    = new Orders();
        $this->orderItemModel = new OrderItem();
    }

    public function create($request)
    {
        $cart  = session('cart');
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = $this->ordersModel->create([
            'customer_name' => $request->full_name,
            'email'         => $request->email,
            'phone_number'  => $request->phone,
            'country'       => $request->country,
            'street_adress' => $request->address,
            'city'          => $request->city,
            'zip_code'      => $request->zip,
            'total'         => $total,
        ]);

        foreach ($cart as $item) {
            $this->orderItemModel->create([
                'order_id' => $order->id,
                'manga_id' => $item['manga_id'],
                'chapter'  => (int) $item['chapter'],
                'quantity' => (int) $item['quantity'],
            ]);
        }

        session()->forget('cart');

    }

}
