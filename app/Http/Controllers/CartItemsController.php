<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    public function index()
    {
        try {
            $articles = CartItems::all();
            return response()->json($articles);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des CartItems {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $article = new CartItems([
                "cartId" => $request->input("cartId"),
                "articleId" => $request->input("articleId"),
                "quantity" => $request->input("quantity"),
                "price" => $request->input("price"),
            ]);
            $article->save();

            return response()->json($article);

        } catch (\Exception $e) {
            return response()->json("insertion impossible {$e->getMessage()}");
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $article = CartItems::findOrFail($id);
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération des données {$e->getMessage()}");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $article = CartItems::findorFail($id);
            $article->update($request->all());
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $article = CartItems::findOrFail($id);
            $article->delete();
            return response()->json("CartItems supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de CartItems {$e->getMessage()}");
        }
    }

    public function getCartItemsByCart($cartId)
    {
        try {
            $cartItems = CartItems::where('cartId', $cartId)->get();  // Filter by cartId
            if ($cartItems->isEmpty()) {
                return response()->json("Aucun article trouvé pour ce cartId", 404);
            }
            return response()->json($cartItems);
        } catch (\Exception $e) {
            return response()->json("Probleme de récupération des articles pour cartId {$cartId}: {$e->getMessage()}", 500);
        }
    }
}
