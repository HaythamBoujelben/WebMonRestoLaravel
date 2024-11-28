<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        try {
            $articles = Orders::all();
            return response()->json($articles);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des Orders {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            // Check if the UserId exists in the userProfiles table
            $user = UserProfile::find($request->input("userId"));
            if (!$user) {
                return response()->json(['error' => 'User not found in userProfiles'], 404);
            }

            $article = new Orders([
                "userId" => $request->input("userId"),
                "orderDate" => $request->input("orderDate"),
                "totalPrice" => $request->input("totalPrice"),
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
            $article = Orders::findOrFail($id);
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
            // Check if the UserId exists in the userProfiles table
            $user = UserProfile::find($request->input("userId"));
            if (!$user) {
                return response()->json(['error' => 'User not found in userProfiles'], 404);
            }
            $article = Orders::findorFail($id);
            $article->update($request->all());
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $article = Orders::findOrFail($id);
            $article->delete();
            return response()->json("Order supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de Order {$e->getMessage()}");
        }
    }
}
