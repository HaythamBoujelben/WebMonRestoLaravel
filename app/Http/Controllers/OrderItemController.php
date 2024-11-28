<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        try {
            $articles = OrderItem::all();
            return response()->json($articles);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des OrderItem {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $article = new OrderItem([
                "orderId" => $request->input("orderId"),
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
            $article = OrderItem::findOrFail($id);
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
            $article = OrderItem::findorFail($id);
            $article->update($request->all());
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $article = OrderItem::findOrFail($id);
            $article->delete();
            return response()->json("OrderItem supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de OrderItem {$e->getMessage()}");
        }
    }
}
