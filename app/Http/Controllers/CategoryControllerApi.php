<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 5;
        $page = $request->page ?? 0;

        return response(
            Category::limit($perpage)
                ->offset($perpage * $page)->where('name','LIKE','%' . $request->search . '%')
                ->get()
        );
    }

    public function total(Request $request)
    {
        return response(Category::where('name','LIKE','%' . $request->search . '%')->count());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Category::find($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('create-good')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление категории',
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description'=>'required|max:255',
        ]);
        $category = new Category($validated);
        $category->save();
        return response()->json([
            'code'=>0,
            'message' => 'Категория успешно добавлен',

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'=>'required|max:255|unique:categories,name,' . $id . ',category_id',
            'description'=>'required|max:255',
        ]);
        try{
            $category = Category::findOrFail($id);
            $category->name  =$validated['name'];
            $category->description  =$validated['description'];
            $category->save();
            return response()->json([
                'code'=>0,
                'message'=>'Категория успешно обновлена',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка при обновлении ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category->goods()->count()){
            return response()->json(['code' => 1, 'error' => 'Нельзя удалить непустую категорию']);
        }
        $deleted = Category::destroy($id);
        if ($deleted == 0){
            return response()->json(['code' => 1, 'error' => 'Категория не найдена']);
        }
        return response()->json(['code' => 0, 'message' => 'Категория успешно удалена']);
    }
}
