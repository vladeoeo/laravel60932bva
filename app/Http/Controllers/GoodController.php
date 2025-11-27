<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('goods',[
            'goods'=>Good::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('good_create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'description'=>'required|max:255',
            'price'=> 'required|integer',
            'stock_quantity'=>'required|integer',
            'brand'=>'required|max:255',
            'img_url'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $validated['img_url'] = "";
        // Загрузка изображения (если есть)
        if ($request->hasFile('img_url')) {
            $validated['img_url'] = $request->file('img_url')->store('images', 'public');
        }

        // Создание товара
        Good::create($validated);

        // Возврат с сообщением
        return redirect('/good');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('good_edit',[
            'good' => Good::all()->where('product_id',$id)->first(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'description'=>'required|max:255',
            'price'=> 'required|integer',
            'stock_quantity'=>'required|integer',
            'brand'=>'required|max:255',
        ]);
        $good = Good::all()->where('product_id',$id)->first();
        $good->name = $validated['name'];
        $good->category_id = $validated['category_id'];
        $good->description = $validated['description'];
        $good->price = $validated['price'];
        $good->stock_quantity = $validated['stock_quantity'];
        $good->brand = $validated['brand'];
        $good->save();
        return redirect('/good');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Gate::allows('actions-good',Good::all()->where('product_id',$id)->first())){
            return redirect('/good')->withErrors([
                'error'=>'У вас нет разрешения на удаление товара номер '.$id]);
        }
        Good::destroy($id);
        return redirect('/good')->withErrors([
            'succes'=>'Успешно удален товар №'.$id
        ]);
    }
}
