<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        try {
            $articles = Articles::all();
            return response()->json($articles);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des articles {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $article = new Articles([
                "name" => $request->input("name"),
                "price" => $request->input("price"),
                "categoryId" => $request->input("categoryId"),
                "menuId" => $request->input("menuId"),
                "imageUrl" => $request->input("imageUrl"),
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
            $article = Articles::findOrFail($id);
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
            $article = Articles::findorFail($id);
            $article->update($request->all());
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $article = Articles::findOrFail($id);
            $article->delete();
            return response()->json("article supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de article {$e->getMessage()}");
        }
    }
}
