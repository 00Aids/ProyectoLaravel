<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function store(Request $request)
    {
        try{
            $request->validate([
                "name" => "required|string",
                "last_name" => "required|string",
                "cedula" => "required|string",
                "email" => "required|email",
                'address' => "required|string",
                "cellphone" => "required|string",
                "id_category" => "required|integer",
                "id_country" => "required|integer",
            ]);
            $user=Users::Create([
                'name' => $request-> name,
                'last_name' => $request-> last_name,
                'cedula' => $request-> cedula,
                'email' => $request-> email,
                'address' => $request-> address,
                'cellphone' => $request-> cellphone,
                'id_category' => $request-> id_category,
                'id_country' => $request-> id_country,
                ]);
            return response()->json([
                'message'=> $user
            ], 201);
            }catch(\Exeption $th){
                return response()->json([
                    'message'->$th->getMessage()
                ],401);
            }

    }
    public function index()
    {
        try {
            return  Users::all();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
