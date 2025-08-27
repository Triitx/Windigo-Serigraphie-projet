<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkoutFromCart($userId)
{
    $user = User::findOrFail($userId);

    // récupérer les lignes du panier
    $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

    if ($cartItems->isEmpty()) {
        return response()->json(['error' => 'Panier vide'], 400);
    }

    return DB::transaction(function () use ($user, $cartItems) {
        $total = 0;

        // Vérifier stocks
        foreach ($cartItems as $item) {
            if ($item->product->stock < $item->quantity) {
                return response()->json([
                    'error' => "Stock insuffisant pour le produit {$item->product->name}"
                ], 400);
            }
            $total += $item->product->price * $item->quantity;
        }

        // Création commande
        $order = Order::create([
            'user_id' => $user->id,
            'total'   => $total,
            'status'  => 'en attente'
        ]);

        // Attacher produits + décrémenter stock
        foreach ($cartItems as $item) {
            $order->products()->attach($item->product->id, [
                'quantity' => $item->quantity,
                'price'    => $item->product->price
            ]);

            $item->product->decrement('stock', $item->quantity);
        }

        // Vider le panier
        Cart::where('user_id', $user->id)->delete();

        return response()->json($order->load('products'), 201);
    });
}
    public function index()
    {
        $orders = Order::with(['user', 'products'])->get();
        return response()->json($orders);
    }

    // 📌 Affiche une commande spécifique
    public function show($id)
    {
        $order = Order::with(['user', 'products'])->findOrFail($id);
        return response()->json($order);
    }

    // 📌 Crée une nouvelle commande avec gestion stock
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $user = User::findOrFail($request->user_id);
        $products = $request->products;

        return DB::transaction(function () use ($user, $products) {
            $total = 0;

            // Vérification des stocks
            foreach ($products as $p) {
                $product = Product::findOrFail($p['id']);
                if ($product->stock < $p['quantity']) {
                    return response()->json([
                        'error' => "Stock insuffisant pour le produit {$product->name}"
                    ], 400);
                }
                $total += $product->price * $p['quantity'];
            }

            // Création de la commande
            $order = Order::create([
                'user_id' => $user->id,
                'total'   => $total,
                'status'  => 'en attente'
            ]);

            // Attacher les produits et décrémenter le stock
            foreach ($products as $p) {
                $product = Product::findOrFail($p['id']);

                $order->products()->attach($product->id, [
                    'quantity' => $p['quantity'],
                    'price'    => $product->price
                ]);

                // décrémentation du stock
                $product->decrement('stock', $p['quantity']);
            }

            return response()->json($order->load('products'), 201);
        });
    }

    // 📌 Met à jour le statut d’une commande
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $order = Order::with('products')->findOrFail($id);

        try {
            // Si on annule → récréditer le stock
            if ($request->status === 'annulée' && $order->status !== 'annulée') {
                foreach ($order->products as $product) {
                    $product->increment('stock', $product->pivot->quantity);
                }
            }

            $order->updateStatus($request->status);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json($order->load('products'));
    }

    // 📌 Supprime une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Rendre le stock si la commande était active
        if ($order->status !== 'annulée') {
            foreach ($order->products as $product) {
                $product->increment('stock', $product->pivot->quantity);
            }
        }

        $order->delete();
        return response()->json(['message' => 'Commande supprimée']);
    }
}

