<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        try {
            $articles = UserProfile::all();
            return response()->json($articles);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des UserProfiles {$e->getMessage()}");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $article = new UserProfile([
                "firstName" => $request->input("firstName"),
                "lastName" => $request->input("lastName"),
                "email" => $request->input("email"),
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
            $article = UserProfile::findOrFail($id);
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
            $article = UserProfile::findorFail($id);
            $article->update($request->all());
            return response()->json($article);
        } catch (\Exception $e) {
            return response()->json("probleme de modification {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $article = UserProfile::findOrFail($id);
            $article->delete();
            return response()->json("UserProfile supprimée avec succes");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression de UserProfile {$e->getMessage()}");
        }
    }
}
