<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 5;
        $page = $request->page ?? 0;

        return response(
            Good::limit($perpage)
                ->offset($perpage * $page)
                ->get()
        );
    }

    public function total()
    {
        return response(Good::all()->count());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Good::find($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(! Gate::allows('create-good')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление товара',
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|integer',
            'description'=>'required|max:255',
            'price'=> 'required|integer',
            'stock_quantity'=>'required|integer',
            'brand'=>'required|max:255',
            'image' => 'required|file',
        ]);
        $file = $request->file('image');
        $originalName = $file->getClientOriginalName();
        if (empty($originalName)) {
            $originalName = 'file.jpg'; // запасное имя
        }
        $filename = rand(1,100000).'_'.$originalName;

        try{
            $path = Storage::disk('s3')->putFileAs('good_pictures',$file,$filename);
            $fileurl = Storage::disk('s3')->url($path);
        }
        catch (\Exception $e){
            return response()->json([
               'code' => 2,
               'message' => $e->getMessage(),
            ]);
        };
        $good = new Good($validated);
        $good->img_url = $fileurl;
        $good->save();
        return response()->json([
            'code'=>0,
            'message' => 'Товар успешно добавлен',

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
