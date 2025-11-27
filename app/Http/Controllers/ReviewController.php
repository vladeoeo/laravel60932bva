<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Good;
use Illuminate\Support\Facades\Gate;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('review_create',[
            'reviews_id'=>$id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $good = Good::all()->where("product_id",$id)->first();
        if (Gate::denies('leave-review', $good)) {
            return redirect('error')->with('message', 'Вы не можете оставить отзыв на товар, который не покупали.');
        }

        $validated = $request->validate([
            'comment' => 'required|max:1000',
            'rating'=>'required|integer|between:0,5',
        ]);


        $validated['product_id'] = $id;
        $validated['user_id'] = $request->user()->id;
        $validated['review_date'] = now();

        // если прошёл проверку
        Review::create($validated);

        return redirect('/good/review/'.$id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Good::all()->where('product_id',$id)->first();
        return view('reviews',[
            'reviews' => Review::all()->where('product_id',$id),
            'product_id'=>$id,
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
