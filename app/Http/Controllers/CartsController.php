<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        try {
            $carts = Carts::all();
            return response()->json($carts);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des carts {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $cart = new Carts([
                "userId" => $request->input("userId"),
            ]);
            $cart->save();

            return response()->json($cart);

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
            $cart = Carts::findOrFail($id);
            return response()->json($cart);
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
            $cart = Carts::findorFail($id);
            $cart->update($request->all());
            return response()->json($cart);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $cart = Carts::findOrFail($id);
            $cart->delete();
            return response()->json("carts supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de carts {$e->getMessage()}");
        }
    }
}
