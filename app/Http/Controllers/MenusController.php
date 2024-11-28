<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function index()
    {
        try {
            $categories = Menus::all();
            return response()->json($categories);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des Menus {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie = new Menus([
                "name" => $request->input("name"), // Accessing 'name' input from the request
            ]);
            $categorie->save();

            return response()->json($categorie);

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
            $categorie = Menus::findOrFail($id);
            return response()->json($categorie);
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
            $categorie = Menus::findorFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $categorie = Menus::findOrFail($id);
            $categorie->delete();
            return response()->json("Menu supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de Menu {$e->getMessage()}");
        }
    }
}
