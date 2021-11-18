<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Mail\PaymentMail;
use App\Models\Cart;
use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**deletes all cart items */
    public function clean(Request $request)
    {
        Cart::where('user_id', Auth::user()->id)->delete();

        if ($request->wantsJson())
            return response()->json([
                'message' => 'Cart was emptied'
            ], 200);

        return redirect('carts.index');
    }
    /**deletes one cart item */
    public function delete(Request $request, $id)
    {
        Cart::findOrFail($id);
        Cart::destroy($id);
        if ($request->wantsJson())
            return response()->json([
                'message' => 'The product was removed from the cart'
            ], 200);

        return redirect('carts');
    }
    /**pays one cart item */
    public function pay(Request $request, $id)
    {
        $item = Shoe::findOrFail($id);
        $details = [
            'color' => $item->color,
            'size' => $item->size,
            'price' => $item->price,
            'brand_id' => $item->brand_id,
        ];
        try {
            Mail::to(Auth::user()?->email)->send(new PaymentMail($details));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'There was a problem with the connection.'
            ]);
        }

        if ($request->wantsJson())
            return response()->json([
                'message' => 'We sent you an email with details of your purchase.'
            ], 200);

        return redirect('carts');
    }
    /**gets every cart item */
    public function index(Request $request)
    {
        $items = Cart::where('user_id', Auth::user()->id)->get();
        if ($request->wantsJson())
            return CartResource::collection($items);
        return view('carts.index', [
            'items' => $items
        ]);
    }
    /**checks if theres any shoe on the cart item */
    public function is_mounted()
    {
        $result = Cart::where('user_id', Auth::user()->id)->count() > 0 ? True : False;
        return response()->json([
            'message' => $result
        ]);
    }
    /**adds one item to cart */
    public function add($id)
    {
        $item = Shoe::findOrFail($id);
        $amount = random_int(1, 10);
        $value = $amount * $item->price;

        Cart::create([
            'shoe_id' => $item->id,
            'amount' => $amount,
            'value' => $value,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'message' => 'Product added to cart'
        ]);
    }
}
