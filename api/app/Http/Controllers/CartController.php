<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller

{

    public function add(Request $request, Cart $cart)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity]
        );
        return redirect()->route('cart.show')->with('success', 'Produit ajouté au panier avec succès !');
    }


    public function show(Cart $cart)
    {

        $cart = Cart::where('user_id', Auth::id())->get();
        return response()->json($cart);
    }

    public function clear(Cart $cart)
    {
        $cart->user_id = Auth::user()->id;
        $cart->delete();
        return response()->json(['success' => 'Panier vidé avec succès !']);
    }


    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->first();
        if ($cart) {
            $cart->delete();
            return redirect()->route('cart.show')->with('success', 'Produit retiré du panier');
        }
        return redirect()->route('cart.show')->with('error', 'Produit non trouvé');
    }
}
