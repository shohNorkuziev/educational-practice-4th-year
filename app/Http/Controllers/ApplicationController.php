<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $data = Application::create($request->all());
        return response()->json([
            "data" =>[
                "apllication" =>$data,
                "message" => "Создан отлкик для рекламного предложения"
            ]
        ],200);
    }
}
