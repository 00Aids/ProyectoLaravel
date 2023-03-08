<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        try {
            return  Categories::all();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string',
            ]);
            $category=Categories::Create([
                'name' => $request-> name,
                ]);
            return response()->json([
                'message'=> $category
            ], 201);
            }
            catch(\Exeption $th){
                return response()->json([
                    'message'->$th->getMessage()
                ],401);
            }
    }
}
