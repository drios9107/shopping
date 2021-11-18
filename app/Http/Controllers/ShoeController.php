<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoeRequest;
use App\Models\Shoe;
use App\Http\Resources\ShoeResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = DB::table('shoes');
        if ($request->wantsJson())
            return ShoeResource::collection($items->paginate(20));

        return view('shoe.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('shoes.create', [
            'brands' => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShoeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShoeRequest $request)
    {
        $model = Shoe::create([
            'color' => $request->color,
            'size' => $request->size,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
        ]);
        $model->save();

        if ($request->wantsJson())
            return response()->json([
                'message' => 'Shoe was created'
            ], 200);

        return redirect('shoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $item = Shoe::findOrFail($id);
        if ($request->wantsJson())
            return new ShoeResource($item);

        return view('shoe.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        return view('shoes.create', [
            'brands' => $brands,
            'item' => Shoe::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoeRequest  $request
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function update(ShoeRequest $request, $id)
    {
        $result = Shoe::where('id', $id)->update([
            'color' => $request->color,
            'size' => $request->size,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
        ]);

        if ($request->wantsJson())
            return response()->json([
                'message' => 'Shoe was updated'
            ], 200);

        return redirect('shoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Shoe::findOrFail($id)) {
            Shoe::destroy($id);
            if ($request->wantsJson())
                return response()->json([
                    'message' => 'Shoe was deleted'
                ], 200);

            return redirect('shoes');
        }
    }
}
