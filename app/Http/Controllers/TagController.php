<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::all();
        return response()->json([
            "data" => [
                "allTag" => $tag,
                "message" => "Все теги"
            ]
        ]);
    }

    public function store(Request $request)
    {
        $data = Tag::create($request->all());
        return response()->json([
            "message"=>"Тег создан",
            "user"=> $data
        ],200);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return response()->json([
            "data" => [
                "tag" => $tag,
                "message" => "Тег обновлен"
            ]
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            "message" => "Тег удален"
        ]);
    }
}
