<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
class CategoriesController extends Controller
{

    public function index()
    {
        try {
            $categories = Categories::all();
            return response()->json($categories);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des catégories {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie = new Categories([
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
            $categorie = Categories::findOrFail($id);
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
            $categorie = Categories::findorFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $categorie = Categories::findOrFail($id);
            $categorie->delete();
            return response()->json("catégorie supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de catégorie {$e->getMessage()}");
        }
    }
}