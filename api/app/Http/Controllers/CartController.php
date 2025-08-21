<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller

{

    public function set(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity]
        );
        $cart->save();
        return redirect()->route('cart.show')->with('success', 'Produit ajouté au panier avec succès !');
    }

    public function add($product_id)
    {
        $cart = Cart::where('product_id', $product_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            $cart = Cart::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'quantity' => 1
                ]
            );
        }
        return redirect()->route('cart.show');
    }

    public function remove($product_id)
    {
        $cart = Cart::where('product_id', $product_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($cart) {
            $cart->quantity -= 1;
            $cart->save();
            if ($cart->quantity <= 0) {
                $cart->delete();
            } else {
                $cart->save();
            }
        };

        return redirect()->route('cart.show');
    }


    public function show(Cart $cart)
    {

        $cart = Cart::where('user_id', Auth::id())->get();
        return response()->json($cart);
    }

    public function clear()
    {
        $user = Auth::user();

        Cart::where('user_id', $user->id)->delete();
        return response()->json(['success' => 'Panier vidé avec succès !']);
    }


    public function delete($id)
    {
        $cart = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();
        if ($cart) {
            $cart->delete();
            return redirect()->route('cart.show')->with('success', 'Produit retiré du panier');
        }
        return redirect()->route('cart.show')->with('error', 'Produit non trouvé');
    }
}
