<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ad = Ad::all();
        return response()->json([
            "data" => [
                "Ad" => $ad,
                "message" => "Все пользователи"
            ]
            ],200);
    }

    public function store(Request $request)
    {
        $ad = Ad::create($request->all());
        return response()->json([
            "data" => [
                "ad" =>$ad,
                "message" => "рекламное предложение создано"
            ]
        ],204);
    }

    public function show(Ad $ad)
    {
        $data = Ad::find($ad);
        return response()->json([
            "data" => $data,
            "message" => "Рекламное предложение найдено"
        ],200);
    }

    public function update(Request $request, Ad $ad)
    {
        $data = $ad->update($request->all());
        return response()->json([
            "data" => [
                "ad" => $ad,
                "message" => "Рекламное предложение обновлено"
            ]
        ],200);
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return response()->json([
            "message" => "Удалена реклама " .$ad['title']
        ],200);
    }
}
