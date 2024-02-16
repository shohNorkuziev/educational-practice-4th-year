<?php

namespace App\Http\Controllers;

use App\Http\Requests\ad\AdCreateRequest;
use App\Http\Requests\ad\AdUpdateRequest;
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

    public function store(AdCreateRequest $request)
    {
        $ad = Ad::create($request->validated());
        return response()->json([
            "data" => [
                "ad" =>$ad,
                "message" => "рекламное предложение создано"
            ]
        ],201);
    }

    public function show(Ad $ad)
    {
        $data = Ad::find($ad);
        return response()->json([
            "data" => $data,
            "message" => "Рекламное предложение найдено"
        ],200);
    }

    public function update(AdUpdateRequest $request, Ad $ad)
    {
        $data = $ad->update($request->validated());
        return response()->json([
            "data" => [
                "ad" => $data,
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
