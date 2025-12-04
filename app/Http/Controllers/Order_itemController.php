<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class Order_itemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Получаем заказ с его элементами и товарами
        $order = Order::with('order_items.good')->find($id);

        if (!$order) {
            // Редирект на список заказов с сообщением об ошибке
            return redirect('/order')->withErrors(['error' => 'Заказ не найден']);
        }

        // Формируем массив товаров
        $items = $order->order_items->map(function($item) {
            return [
                'product_id' => $item->product_id,
                'product_name' => $item->good->name ?? 'Unknown',
                'quantity' => $item->quantity,
                'price' => $item->price,
            ];
        });

        // Вычисляем общую сумму
        $total = $order->order_items->sum(function($item) {
            return $item->price * $item->quantity;
        });

        return view('order_items',[
            'order'=>$order,'items'=>$items,'total'=>$total, 'id'=>$id
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {}
}
